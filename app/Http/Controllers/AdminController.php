<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Pet;
use App\Category;
use App\Subcategory;
use App\Brand;
use App\Lifestage;
use App\HealthConsideration;
use App\Breed;
use App\Weight;
use App\Volume;
use App\TabletQuantity;
use App\Composition;
use App\Color;
use App\Product;
use App\ProductImage;
use App\StockManagement;
use App\User;
use App\Order;
use App\Admin;

use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function managePets()
    {
       $pets = Pet::all();
       return view('admin.pets.manage-pets',compact('pets'));
    }
    public function manageCategories()
    {
        $categories = Category::orderBy('id','desc')->paginate(6);
        return view('admin.pets.manage-categories',compact('categories'));
    }
    public function manageSubcategories()
    {
        $subcategories = Subcategory::orderBy('id','desc')->paginate(6);
        $pets = Pet::where('status',1)->get();
        return view('admin.pets.manage-subcategories',compact('subcategories','pets'));
    }
    public function postAddSubcategory(Request $request)
    {
        Subcategory::insert([
            'pet_id' => $request->pet,
            'category_id' => $request->category,
            'subcategory_name' => $request->subcategory
        ]);
        return redirect()->back()->with('message','Subcategory added !');
    }
    public function manageBrands()
    {
        $brands = Brand::orderBy('id','desc')->paginate(6);
        $pets = Pet::where('status',1)->get();
        return view('admin.misc.manage-brands',compact('brands','pets'));
    }
    public function postAddBrand(Request $request)
    {
        Brand::insert([
            'category_id' => $request->category,
            'brand_name' => $request->brand
        ]);
        return redirect()->back()->with('message','Brand added !');
    }
    public function manageLifestages()
    {
        $lifestages = Lifestage::orderBy('id','desc')->get();
        return view('admin.misc.manage-lifestages',compact('lifestages'));
    }
    public function postAddLifestage(Request $request)
    {
        Lifestage::insert([
            'lifestage_category' => $request->lifestage_category,
            'lifestage_subcategory' => $request->lifestage_subcategory
        ]);
        return redirect()->back()->with('message','Lifestage added !');
    }
    public function allTables()
    {
        $health_considerations = HealthConsideration::orderBy('id','desc')->get();
        $breeds = Breed::all();
        $weights = Weight::all();
        $volumes = Volume::all();
        $quantites = TabletQuantity::all();
        $compositions = Composition::all();
        $colors = Color::all();
        return view('admin.misc.all-tables',compact('health_considerations','breeds','weights','volumes','quantites','compositions','colors'));
    }
    public function postAddHc(Request $request)
    {
        HealthConsideration::insert(['hc_type' => $request->hc]);
        return redirect()->back()->with('message','Health consideration added !');
    }
    public function postAddBreed(Request $request)
    {
        Breed::insert(['breed' => $request->breed]);
        return redirect()->back()->with('message','Breed added !');
    }
    public function postAddWeight(Request $request)
    {
        Weight::insert(['weight' => $request->weight]);
        return redirect()->back()->with('message','Weight added !');
    }
    public function postAddVolume(Request $request)
    {
        Volume::insert(['volume' => $request->volume]);
        return redirect()->back()->with('message','Volume added !');
    }
    public function postAddQuantity(Request $request)
    {
        TabletQuantity::insert(['quantity' => $request->quantity]);
        return redirect()->back()->with('message','Quantity added !');
    }
    public function postAddComposition(Request $request)
    {
        Composition::insert(['composition' => $request->composition]);
        return redirect()->back()->with('message','Composition added !');
    }
    public function postAddColor(Request $request)
    {
        Color::insert(['color' => $request->color]);
        return redirect()->back()->with('message','Color added !');
    }
    public function addNewProduct_step1(Request $request)
    {
        $products = $request->session()->get('products');
        $pets = Pet::where('status',1)->get();
        $lifestages = Lifestage::all();
        $health_considerations = HealthConsideration::all();
        $breeds = Breed::all();
        $weights = Weight::all();
        $volumes = Volume::all();
        $quantities = TabletQuantity::all();
        $compositions = Composition::all();
        $colors = Color::all();
        return view('admin.product.add-new-product-step1',compact('pets','lifestages','health_considerations','breeds','weights','volumes','quantities','compositions','colors'));
    }
    public function postAddProduct_step1(Request $request)
    { 
        //dd($request->all());
        session()->put('products', $request->all());
        return redirect()->route('add-new-product-step2');
    }
    public function addNewProduct_step2(Request $request)
    {
        return view('admin.product.add-new-product-step2');
    }
    public function postAddProduct_step2(Request $request)
    { 
        session()->put('description',$request->description);
        if($request->hasFile('thumbnail')) {
           $image = $request->file('thumbnail');
           $file_name=time().'_'."img.png";
           $destinationPath = storage_path('/app/public/images/products/');
           $image->move($destinationPath, $file_name);
           session()->put('thumbnail',$file_name);
        }
        return redirect()->route('add-new-product-step3');
    }
    public function addNewProduct_step3(Request $request)
    {
        return view('admin.product.add-new-product-step3');
    }
    public function removeUploadedThumbnail(Request $request)
    {
        $thumbnail = session()->get('thumbnail');
        $img = storage_path('/app/public/images/products/'.$thumbnail);
        unlink($img);
        session()->forget('thumbnail');
        return redirect()->back()->with('message','Image removed Successfully!');
    }
    public function postAddProduct(Request $request)
    {
        $product = session()->get('products');
        $thumbnail = session()->get('thumbnail');
        $description = session()->get('description');
        $unique_num = $this->uniqueProductNumber();
        $product_code = 'MAB'.$unique_num;
        $slug =substr(time(),5)."-".str_replace(' ','-',$product['title']);
        Product::addProduct($product,$description,$product_code,$slug);
        $product_id = Product::where('unique_product_id',$product_code)->value('id');
        ProductImage::insert([
            'product_id' => $product_id,
            'image' => $thumbnail,
            'is_thumbnail' => 1
        ]);
        session()->forget('products');
        session()->forget('description');
        session()->forget('thumbnail');
        return redirect()->route('manage-products');
    }
    public function uniqueProductNumber()
    {
      $product=Product::orderBy('id','desc')->first();
      if($product){
        $id=$product['unique_product_id'];
        $number=explode('MAB',$id);
        $number[1]++;
        $unique_num=sprintf('%04d', $number[1]);
        return $unique_num;
       }
       else{
         $unique_num="0001";
         return $unique_num;
       }
    }
    public function manageProducts()
    {
        $pets = Pet::where('status',1)->get();
        $products = Product::orderBy('id','desc')->paginate(10);
        return view('admin.product.manage-products',compact('products','pets'));
    }
    public function editProduct($id)
    {
        $product = Product::where('id',$id)->first();
        return view('admin.product.edit-product',compact('product'));
    }
    public function updateProductPrice(Request $request)
    {
        // dd($request->offerprice);
        Product::where('id',$request->pid)->update([
            'price' => $request->price,
            'offer_price' => $request->offerprice,
        ]);
        return redirect()->back()->with('message','Price updated !');
    }
    public function uploadProductImages(Request $request)
    {
        $product_id = $request->productid;
        if($request->hasFile('images')){
          foreach ($request->images as $image) {
                $file_name = rand(100,10000000).'_'."img.png";
                $destinationPath = storage_path('/app/public/images/products/');
                $image->move($destinationPath, $file_name);
                 productImage::insert([
                    'product_id'=> $product_id,
                    'image'=> $file_name,
                ]);
            }
        }
        return redirect()->back()->with('message','Product image uploaded !');
    }
    public function updateProductThumbnail(Request $request)
    {
      if($request->image != ""){
        $prev_thumbnail = ProductImage::where('product_id',$request->productid)->where('is_thumbnail',1)->first();
        // $prev_thumb_image = storage_path("/app/public/images/products/{$prev_thumbnail->image}");
        // unlink($prev_thumb_image);
        $thumbnail = $request->file('image');
        $file_name=time().'_'."img.png";
        $destinationPath = storage_path('/app/public/images/products');
        $thumbnail->move($destinationPath, $file_name);
        ProductImage::where('id',$prev_thumbnail->id)->update([
          'image' => $file_name,
        ]);
        return redirect()->back()->with('message','Product Thumbnail updated !');
      }
      
    }
    public function product_image_status_inactive($id)
    {
        ProductImage::where('id',$id)->update(['status' => 0]);
        return redirect()->back()->with('error','status inactive !');
    }
    public function product_image_status_active($id)
    {
        ProductImage::where('id',$id)->update(['status' => 1]);
        return redirect()->back()->with('message','status active !');
    }
    public function manageProductStock($id)
    {
        $stocks_count = DB::table('stock_managements')->where('product_id',$id)->count();
        return view('admin.product.manage-product-stock',compact('id','stocks_count'));
    }
    public function postAddStock(Request $request)
    {
        DB::table('stock_managements')->insert([
          'product_id' => $request->pid,
          'quantity' => $request->quantity,
          'expiry_date' => $request->expiry
        ]);
        return redirect()->back()->with('message','stock added !');
    }
    public function updateExpiryStock(Request $request)
    {
        $qty = DB::table('stock_managements')->where('id',$request->sid)->value('quantity');
        if($qty >0 ){
            if($qty >= $request->deduct_stock){
               $updated_qty =  $qty - $request->deduct_stock;
               DB::table('stock_managements')->where('id',$request->sid)->update(['quantity' => $updated_qty]);
               return redirect()->back()->with('message','stock updated!');
            }else{
               return redirect()->back()->with('error','Insufficient stock!');
            }
       }else{
           return redirect()->back()->with('error','something went wrong!');
       }
        
    }
    public function manageUsers(Request $request)
    {
        $users = DB::table('users');
        if(isset($request->start_date))
        {
          $users = $users->where('created_at','>=',$request->start_date);
        }
        if(isset($request->end_date))
        {
          $enddate = date('Y-m-d',strtotime($request->end_date.'+1 day'));
          $users = $users->where('created_at','<=',$enddate);
        }
        if(isset($request->search))
        {
          $users = $users->where('unique_user_id','like',$request->search)->orwhere('mobile','like',$request->search)->orwhere('email','like',$request->search)->orwhere('name','like',$request->search);
        }
        $users = $users->orderBy('id','desc')->paginate(50)->appends([
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
        ]);
        $users_count = count($users);
        return view('admin.users.manage-users',compact('users','users_count'));
    }
    public function manageOrders(Request $request)
    {
        $orders = DB::table('orders');
        if(isset($request->start_date))
        {
          $orders = $orders->where('created_at','>=',$request->start_date);
        }
        if(isset($request->end_date))
        {
          $enddate = date('Y-m-d',strtotime($request->end_date.'+1 day'));
          $orders = $orders->where('created_at','<=',$enddate);
        }
        if(isset($request->status))
        {
          $orders = $orders->where('order_status',$request->status);
        }
        if(isset($request->search))
        {
          $orders = $orders->where('unique_order_id','like',$request->search)->orwhere('mobile','like',$request->search);
        }
        $orders = $orders->orderBy('id','desc')->paginate(50)->appends([
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'status' => request('status'),
        ]);
        $orders_count = count($orders);
        return view('admin.order.manage-orders',compact('orders','orders_count'));
    }
    public function paymentDetails($id)
    {
      return $order = Order::where('id',$id)->first();
    }
    public function userInfo($id)
    {
       $user = app('App\Http\Controllers\BaseController')->getUserInfo($id);
       return view('admin.users.user-info',compact('user'));
    }
    public function updateOrderStatus(Request $request)
    {
      if($request->update_status == ""){
         return redirect()->back();
      }
      elseif($request->update_status == "Shipped"){
         Order::where('id',$request->orderid)->update(['order_status' => $request->update_status, 'expected_delivery_date' => $request->exp_delivery_date]);
      }else{
         Order::where('id',$request->orderid)->update(['order_status' => $request->update_status]);
      }
      return redirect()->back();
    }
    public function orderDetails($id)
    {
        $order = Order::where('id',$id)->first();
        return view('admin.order.order-details',compact('order'));
    }
    public function manageAdmin()
    {
        $admins = Admin::orderBy('id','desc')->get();
        return view('admin.admins.manage-admin',compact('admins'));
    }
    public function addNewAdmin(Request $request)
    {
         $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'mobile' => 'required|regex:/[0-9]{10}/|min:10|max:13|unique:admins',
        ]);
        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'is_super' => $request->issuper
        ]);
        return redirect()->back();
    }
    public function inactiveProductStatus(Request $request)
    {
      Product::where('id',$request->id)->update([
             'status' => 0,
         ]);
        return back()->with('success','status inactivated successfully...');
    }
    public function activeProductStatus(Request $request)
    {
      Product::where('id',$request->id)->update([
             'status' => 1,
         ]);
        return back()->with('success','status activated successfully...');
    }
    public function updateProductTitle(Request $request)
    {
        Product::where('id',$request->pid)->update(['title' => $request->title]);
        return redirect()->back();
    }
    public function updateOtherInfo(Request $request)
    {
      $data = $request->all();
      $product = Product::where('id',$request->pid)->first();
      if(isset($data['lifestage']))
         $product->lifestage = $data['lifestage'];
        if(isset($data['health_consideration']))
         $product->health_consideration = $data['health_consideration'];
        if(isset($data['breed']))
         $product->breed = $data['breed'];
        if(isset($data['weight']))
         $product->weight = $data['weight'];
        if(isset($data['volume']))
         $product->volume = $data['volume'];
        if(isset($data['tablet_quantity']))
         $product->tablet_quantity = $data['tablet_quantity'];
        if(isset($data['composition']))
         $product->composition = $data['composition'];
        if(isset($data['color']))
         $product->color = $data['color'];
        if(isset($data['size']))
         $product->size = $data['size'];
      $product->save();
      return redirect()->back();
    }
    public function updateProductDesc(Request $request)
    {
        Product::where('id',$request->pid)->update(['description' => $request->description]);
        return redirect()->back();
    }
}
