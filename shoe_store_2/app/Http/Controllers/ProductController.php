<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use Dotenv\Parser\Value;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;




class ProductController extends Controller
{
    // main page controller
    public function catalog(Request $req)
    {
        return view('/catalog');
    }

    public function about(){

        return view('about');
    }
    public function contact(){

        return view('contact');
    }

    public function sort(Request $req)
    {
        $item = $req->data;
       
        
     switch($item){
        case 'ball':
            $product = Product::all();
            $image = Image::all();
            return response()->json([
                'product' => $product,
                'image' => $image,
            ]);
            break;
        case 'bformal':
            $product = DB::table('products')->select()->where('product_style',"=","formal")->get();
            $image = Image::all();
            return response()->json([
                'product' => $product,
                'image' => $image,
            ]);
            break;
        

        case 'all':
            $product = Product::all();
            $image = Image::all();
            return response()->json([
                'product' => $product,
                'image' => $image,
            ]);
            break;

        case 'white' :   
             $product = Product::select()->where('product_color', $item)->get();
             $image = Image::all();
             return response()->json([
                'product' => $product,
                'image' => $image,
    
            ]);   break;
        case 'red' :   
             $product = Product::select()->where('product_color', $item)->get();
             $image = Image::all();
             return response()->json([
                'product' => $product,
                'image' => $image,
    
            ]);   break;
        case 'blue' :   
             $product = Product::select()->where('product_color', $item)->get();
             $image = Image::all();
             return response()->json([
                'product' => $product,
                'image' => $image,
    
            ]);   break;
        case 'brown' :   
             $product = Product::select()->where('product_color', $item)->get();
             $image = Image::all();
             return response()->json([
                'product' => $product,
                'image' => $image,
    
            ]);   break;
        case 'grey' :   
             $product = Product::select()->where('product_color', $item)->get();
             $image = Image::all();
             return response()->json([
                'product' => $product,
                'image' => $image,
    
            ]);   break;
        case 'black' :   
             $product = Product::select()->where('product_color', $item)->get();
             $image = Image::all();
             return response()->json([
                'product' => $product,
                'image' => $image,
    
            ]);
            break;
        case '44':
            $product = DB::table("products")->select()->where("product_size", "LIKE","%44%")->get();
            $image = Image::all();
            return response()->json([
               'product' => $product,
               'image' => $image,
           ]);
            break;
        case '43':
            $product = DB::table("products")->select()->where("product_size", "LIKE","%43%")->get();
            $image = Image::all();
            return response()->json([
               'product' => $product,
               'image' => $image,
           ]);
            break;
        case '42':
            $product = DB::table("products")->select()->where("product_size", "LIKE","%42%")->get();
            $image = Image::all();
            return response()->json([
               'product' => $product,
               'image' => $image,
           ]);
            break;
        case '41':
            $product = DB::table("products")->select()->where("product_size", "LIKE","%41%")->get();
            $image = Image::all();
            return response()->json([
               'product' => $product,
               'image' => $image,
           ]);
            break;
        case '40':
            $product = DB::table("products")->select()->where("product_size", "LIKE","%40%")->get();
            $image = Image::all();
            return response()->json([
               'product' => $product,
               'image' => $image,
           ]);
            break;

       
     }
      // Get products by style
      $product = Product::select()->where('product_style', $item)->get();
      $image = Image::all();
    
        return response()->json([
            'product' => $product,
            'image' => $image,
         
        ]);
    }


    public function create(Request $req)
    {
        $product =  Product::all();


        return view('productCRUD.productCreate', compact('product'));
    }

    public function productDB(Request $req)
    {

        $product = Product::when($req->has('product'), function ($q) use ($req) {
            return $q->where("product_name", "like", "%" . $req->get("product_name") . "%");
        })->paginate(4);
        if ($req->ajax()) {
            return view('allProductsDb.productPagination', ['product' => $product]);
        }
        return view('allProductsDb.productDB', ['product' => $product]);
    }

    public function store(Request $req)
    {
        $new_product = new Product();
        $req->all();

        // convert number of shoes, from option/select menu

        function shoeNumber(Request $req)
        {
            $size40 = $req->s40;
            $size41 = $req->s41;
            $size42 = $req->s42;
            $size43 = $req->s43;
            $size44 = $req->s44;

            $string = str_repeat('40', $size40);
            $string1 = str_repeat('41', $size41);
            $string2 = str_repeat('42', $size42);
            $string3 = str_repeat('43', $size43);
            $string4 = str_repeat('44', $size44);

            $arrString = $string . $string1 . $string2 . $string3 . $string4;
            $size = implode(' ', str_split($arrString, 2));
            return $size;
        }

        $title = $req->title;
        $style = $req->style;
        $color = $req->color;
        $price = $req->price;
        $gender = $req->gender;
        $description = $req->description;

        $new_product->product_name = $title;
        $new_product->product_style = $style;
        $new_product->product_size = shoeNumber($req);
        $new_product->product_color = $color;
        $new_product->product_price = $price;
        $new_product->gender = $gender;
        $new_product->product_description = $description;

        $new_product->save();

        if ($req->has('images')) {
            foreach ($req->file('images') as $image) {
                $imageName = time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(('storage/product_images'), $imageName);
                Image::create([
                    'product_id' => $new_product->id,
                    'image' => $imageName,
                ]);
            }
        }
        return back()->with('success', 'Added');
    }

    //show images in images view blade
    public function images($id)
    {
        $product = Product::find($id);
        if (!$product) abort(404);
        $images = $product->images;

        return view('productCRUD.images', compact('product', 'images'));
    }


    public function productShow($id)
    {
        $product = Product::findOrFail($id);
        $s = DB::table('products')->select('product_size')->where('id', '=', $id)->get()->collect();
        $size = explode(' ', $s);
        $size = array_unique($size);

        if (!$product) {
            abort(404);
        } else {
            $images = DB::table('images')->select()->where('product_id', '=', $product->id)->get();
      
            return view('productCRUD.productShow', compact('product', 'size', 'images'));
        }
       
    }

    public function delete(Request $req)
    {
        $product = Product::findOrFail($req->id);

        // Delete multiple record(images) from public folder
        $images = $product->images;
        foreach ($images as $i) {
            $img = $i->image;
            $img_path = public_path("storage/product_images/" . $img);
            unlink($img_path);
        }
        // delete data from DB
        $images = DB::table('images')->where('product_id', '=', $product)->truncate();
        $product->delete();

        return back()->with('deleted', 'Deleted');
    }

    public function editPage(Request $req)
    {
        $id = $req->id;
        $product = Product::findOrFail($id);

        $prodSize = $req->size;
        $s = explode(" ", $prodSize);
        $countS = count($s);
        $size40 = 0;
        $size41 = 0;
        $size42 = 0;
        $size43 = 0;
        $size44 = 0;

        for ($i = 0; $i < $countS - 1; $i++) {
            if ($s[$i] == "40") {
                $size40++;
            }
        }
        for ($i = 0; $i < $countS; $i++) {
            if ($s[$i] == "41") {
                $size41++;
            }
        }
        for ($i = 0; $i < $countS; $i++) {
            if ($s[$i] == "42") {
                $size42++;
            }
        }
        for ($i = 0; $i < $countS; $i++) {
            if ($s[$i] == "43") {
                $size43++;
            }
        }
        for ($i = 0; $i < $countS; $i++) {
            if ($s[$i] == "44") {
                $size44++;
            }
        }

        //if are images in DB then fetch them in view
        if (!empty($product->images)) {
            $image = $product->images->take(4);
            //  if exist return object`s
            return view('productCRUD.productEdit', compact(
                'product',
                'image',
                'size40',
                'size41',
                'size42',
                'size43',
                'size44',
            ));
        } else {
            //if not then not
            return view('productCRUD.productEdit', compact(
                'product',
                'size40',
                'size41',
                'size42',
                'size43',
                'size44',
            ));
        }
    }

    public function update(Request $req)
    {
        $edit_product = $req->id;
        $product_id = Product::findOrFail($edit_product);
        $req->all();

        $title = $req->title;
        $style = $req->style;

        $size40 = $req->s40;
        $size41 = $req->s41;
        $size42 = $req->s42;
        $size43 = $req->s43;
        $size44 = $req->s44;

        $string = str_repeat("40",  (int) $size40);
        $string1 = str_repeat('41', (int)$size41);
        $string2 = str_repeat('42', (int) $size42);
        $string3 = str_repeat('43', (int)$size43);
        $string4 = str_repeat('44', (int)$size44);

        $arrString = $string . $string1 . $string2 . $string3 . $string4;
        $size = implode(" ", str_split($arrString, 2));


        $color = $req->color;
        $price = $req->price;
        $gender = $req->gender;
        $description = $req->description;

        $product_id->product_name = $title;
        $product_id->product_style = $style;
        $product_id->product_size = $size;
        $product_id->product_color = $color;
        $product_id->product_price = $price;
        $product_id->gender = $gender;
        $product_id->product_description = $description;


        $product_id->save();

        $image_id = Image::where('product_id', '=', $product_id)->get();

        if ($req->has('images')) {
            $delete_old_images = Image::where('product_id', '=', $product_id)->truncate();
            foreach ($delete_old_images as $i) {
                $img = $i->image;
                $img_path = public_path("storage/product_images/" . $img);
                unlink($img_path);
            }
            foreach ($req->file('images') as $image) {
                $imageName = time() . rand(1, 1000) . '.' . $image->extension();
                $image->move(public_path('product_images'), $imageName);
                Image::create([
                    'product_id' => $product_id->id,
                    'image' => $imageName,
                ]);
            }
        }
        return redirect('/all-products')->with(compact('size'));
    }

    public function search(Request $req)
    {
      
        if ($req->dataTitle != '') {
            $products = Product::where('product_name', 'LIKE', '%' . $req->dataTitle . '%')->get();
               return response()->json([
            'products' => $products,
   
        ]);
          
       }
        if ($req->dataStyle != '') {
            $productStyle = Product::where('product_style', 'LIKE', '%' . $req->dataStyle . '%')->get();
               return response()->json([
            'productStyle' => $productStyle,

        ]);
          
       }
        if ($req->dataColor != '') {
            $productColor = Product::where('product_color', 'LIKE', '%' . $req->dataColor . '%')->get();
               return response()->json([
            'productColor' => $productColor,

        ]);
          
       }
      

     
    }

    public function allProducts()
    {   
       
        // connect via foreign key to table images and fetch data 
        //  like <h1>{{$products[6]->images[0]->image}}</h1>
        
        $products = Product::with(['images'])->latest()->take(8)->get();

         if($products != null){
            return view('allProducts', compact(
            'products',
        ));
         }
         return view('/contact');
        
    }
}
