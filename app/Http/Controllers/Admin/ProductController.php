<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\ProductColor;
use Illuminate\Support\Str;
use App\Http\Requests\ProductFormRequest;

class ProductController extends Controller
{

    private $uploadPath = 'uploads/product/';

    public function index(){
        return view('admin.product.index');
    }

    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status', '0')->get();
        return view('admin.product.create', compact('categories', 'brands', 'colors'));
    }

    public function store(ProductFormRequest $request){

        $validateData = $request->validated();
        $category = Category::findOrFail($validateData['category_id']);
        $product = $category->products()->create([
            'category_id' => $validateData['category_id'],
            'name' => $validateData['name'],
            'slug' => Str::slug($validateData['slug']),
            'brand_id' => $validateData['brand_id'],
            'small_description' => $validateData['small_description'],
            'description' => $validateData['description'],
            'original_price' => $validateData['original_price'],
            'selling_price' => $validateData['selling_price'],
            'quantity' => $validateData['quantity'],
            'trending' => $request['trending'] == true ? '1' : '0',
            'status' => $request['status'] == true ? '1' : '0',
            'meta_title' => $validateData['meta_title'],
            'meta_keyword' => $validateData['meta_keyword'],
            'meta_description' => $validateData['meta_description']
        ]);

        if( $request->hasFile('image') ){

            $imageFiles = $request->file('image');
            foreach( $imageFiles as $key => $imageFile ){
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$key.'.'.$extension;
                $imageFile->move($this->uploadPath, $filename);
                $finalImagePathName = $this->uploadPath.$filename;
                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $finalImagePathName
                ]);
            }
        }

        if( $request->colors ){
            foreach( $request->colors as $key => $color ){
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->quantities[$key] ?? 0,
                ]);
            }
        }

        return redirect('admin/product')->with('message', 'Thêm sản phẩm thành công');
    }

    public function edit(Product $product){
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status', '0s')->get();
        return view('admin.product.edit', compact('product', 'categories', 'brands', 'colors'));
    }

    public function update(ProductFormRequest $request, $product){
        $validateData = $request->validated();

        $product = Category::findOrFail($validateData['category_id'])
                            ->products()
                            ->where('id', $product)
                            ->first();

        if( $product ){
            $product->update([
                'category_id' => $validateData['category_id'],
                'name' => $validateData['name'],
                'slug' => Str::slug($validateData['slug']),
                'brand_id' => $validateData['brand_id'],
                'small_description' => $validateData['small_description'],
                'description' => $validateData['description'],
                'original_price' => $validateData['original_price'],
                'selling_price' => $validateData['selling_price'],
                'quantity' => $validateData['quantity'],
                'trending' => $request['trending'] == true ? '1' : '0',
                'status' => $request['status'] == true ? '1' : '0',
                'meta_title' => $validateData['meta_title'],
                'meta_keyword' => $validateData['meta_keyword'],
                'meta_description' => $validateData['meta_description']
            ]);
    
            if( $request->hasFile('image') ){
                $imageFiles = $request->file('image');
                foreach( $imageFiles as $key => $imageFile ){
                    $extension = $imageFile->getClientOriginalExtension();
                    $filename = time().$key.'.'.$extension;
                    $imageFile->move($this->uploadPath, $filename);
                    $finalImagePathName = $this->uploadPath.$filename;
    
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName
                    ]);
                }
            }

            if( $request->colors ){
                foreach( $request->colors as $key => $color ){
                    $product->productColors()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $request->quantities[$key] ?? 0,
                    ]);
                }
            }

            return redirect('admin/product')->with('message', 'Sửa sản phẩm thành công');

        }else{

            return redirect('admin/product')->with('message', 'Không tìm thấy product_ID!'); 
        }

    }

    public function delete($id){
        $product = Product::findOrFail($id);
        $productImages = $product->productImages();
        if( $productImages ){
            foreach( $productImages as $item ){
                if( File::exists($item->image) ){
                    File::delete($item->image);
                }
            }
        }
        $product->delete();
        return redirect('admin/product')->with('message', 'Xóa sản phẩm thành công');
    }

    public function updateProdColorQty(Request $request, $prod_color_id){
        $productColorData = Product::findOrFail($request->product_id)
                                    ->productColors()
                                    ->where('id', $prod_color_id)
                                    ->first();

        $productColorData->update([
            'quantity' => $request->qty,
        ]);

        return response()->json(['message' => 'Product Color Qty updated!']);
    }

    public function deleteProdColor($prod_color_id){
       
        $prodColor = ProductColor::findOrFail($prod_color_id)->delete();
        return response()->json(['message' => 'Product Color deleted!']);
    }
}
