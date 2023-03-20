<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pet;
use App\Category;
use App\Subcategory;
use App\Brand;
use App\Lifestage;
use App\HealthConsideration;
use App\Breed;
use App\Composition;
use App\Weight;
use App\Volume;
use App\TabletQuantity;
use App\Color;
use App\Product;
use App\Address;
use App\User;
use App\Order;
use DB;

class BaseController extends Controller
{
    public function getPetName($id)
    {
       return Pet::where('id',$id)->value('pet_name');
    }
    public function getCategoryList(Request $request)
    {
        $category = DB::table("categories")
                ->where("pet_id",$request->pet_id)
                ->pluck("name","id");
        return response()->json($category);
    }
    public function getSubcategoryList(Request $request)
    {
        $subcategory = DB::table("subcategories")
                ->where("category_id",$request->category_id)
                ->pluck("subcategory_name","id");
        return response()->json($subcategory);
    }
    public function getBrandList(Request $request)
    {
        $brand = DB::table("brands")
                ->where("category_id",$request->category_id)
                ->pluck("brand_name","id");
        return response()->json($brand);
    }
    public function getCategoryName($id)
    {
       return Category::where('id',$id)->value('name');
    }
    public function getSubcategoryName($id)
    {
       return Subcategory::where('id',$id)->value('subcategory_name');
    }
    public function getBrandName($id)
    {
       return Brand::where('id',$id)->value('brand_name');
    }
    public function getLifestage($id)
    {
       return Lifestage::where('id',$id)->first();
    }
    public function getHealthConsideration($id)
    {
       return HealthConsideration::where('id',$id)->value('hc_type');
    }
    public function getBreed($id)
    {
       return Breed::where('id',$id)->value('breed');
    }
    public function getComposition($id)
    {
       return Composition::where('id',$id)->value('composition');
    }
    public function getWeight($id)
    {
       return Weight::where('id',$id)->value('weight');
    }
    public function getVolume($id)
    {
       return Volume::where('id',$id)->value('volume');
    }
    public function getTabQuantity($id)
    {
        return TabletQuantity::where('id',$id)->value('quantity');
    }
    public function getColor($id)
    {
        return Color::where('id',$id)->value('color');
    }
    public function offPercentage($price, $offer_price)
    {
        $off_percentage = ($price - $offer_price) / $price * 100;
        $round_off_percentage = round($off_percentage);
        return $round_off_percentage;
    }
    public function generateUniqueNum()
    {
      return rand(11,99).rand(1,9).rand(11,99).rand(11,99).rand(1,9).rand(11,99);
    }
    public function getDeliveryAddress($id)
    {
       return Address::where('id',$id)->first();
    }
    public function getUserId($id)
    {
      return User::where('id',$id)->value('unique_user_id');
    }
    public function getProductName($product_id)
    {
      return Product::where('id',$product_id)->value('title');
    }
    public function getSlug($product_id)
    {
      return Product::where('id',$product_id)->value('slug');
    }
    public function getOrder($order_id)
    {
      return Order::where('id',$order_id)->value('unique_order_id');
    }
    public function getUserInfo($id)
    {
        return User::where('unique_user_id',$id)->first();
    }
}
