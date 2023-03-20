<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    protected $fillable = array('title', 'pet_type','category','subcategory','price','osser_price','brand');

    public static function addProduct($data,$description,$unique_id,$slug)
    {
        $product = new Product();
        $product->title = $data['title'];
        $product->unique_product_id = $unique_id;
        $product->slug = $slug;
        $product->pet_type = $data['pet'];
        $product->category = $data['category'];
        $product->subcategory = $data['subcategory'];
        $product->price = $data['price'];
        $product->offer_price = $data['offerprice'];
        if(isset($data['gst']))
         $product->gst_percentage = $data['gst'];
        $product->brand = $data['brand'];
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
        $product->description = $description;
        $product->stock = $data['stock'];
        $product->created_by = Auth::user()->id;
        $product->save();
    }
}
