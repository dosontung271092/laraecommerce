<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proimg;
use Illuminate\Support\Facades\File;

class ProimgController extends Controller
{
    public function delete($id){
        $productImage = ProductImage::findOrFail($id);
        if( File::exists($productImage->image) ){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect("/admin/product/".$productImage->product_id."#edit-product__img")->with('message', 'Xóa ảnh thành công');
    }
}
