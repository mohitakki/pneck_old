<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductModel;
use App\CategoryModel;
use Validator;
use File;
use function GuzzleHttp\json_decode;
use App\Http\Controllers\API\BaseController as BaseController;
use function GuzzleHttp\json_encode;

class ProducWithCategorytController extends BaseController
{
    public function addProduct(Request $request)
    {
        $rules = [
            'file'  => 'required',
            'user_id' => 'required',
            'fk_category_id' => 'required',
            'name'           => 'required',
            'mrp'            => 'required',
            'selling_price'  => 'required',
            'quantitytype'=> 'required',
            'quantity'=> 'required',
            'details'=>'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errorString = implode(",",$validator->messages()->all());
            // Validation failed
             return response()->json([
               'error' => $errorString,
               'status' => '0'
            ],200);
       }
        else{
            // if($request->hasFile('part')) {

            //         $file = $request->file('part');
            //         $name=$file->getClientOriginalName();
            //         $path = public_path() . '/product_image/';
            //         $fullname = time().'-'.$name;
            //         $fileupload = $file->move($path, $fullname);
            //         // dd($fileupload);
            //         if($fileupload){
            //             return response()->json(['status'=>'1','success'=>'Image upload'],200);
            //         }
            //         return response()->json(['status'=>'0','error'=>'Image not uploaded'],200);       
            //     }else{
            //         return response()->json(['status'=>'0','error'=>'Image not uploaded'],200);
            //     } 

            //     return response()->json(['status'=>'0','error'=>'Image not uploaded'],200);




            // $file = $request->file('image');
            // if(!$file->isValid()) {
            //     return response()->json(['error' => 'Invalid file upload'], 400);
            // }
            // $files = $request->file('image');
            // $images=array();
            // // dd(gettype($files));
            // if($request->hasFile('image')){
            //     foreach($files as $key => $file) {
            //         // dd($file);
            //         $name=$file->getClientOriginalName();
            //         $path = public_path() . '/product_image/';
            //         $fullname = time().'-'.$name;
            //         // dd($fullname);
            //         $file->move($path, $fullname);
            //         $images[]=$fullname;
            //     }
            // }

            $input=$request->all();
            $images=array();
            if($files=$request->file('file')){
                foreach($files as $file){
                    $name=$file->getClientOriginalName();
                    $path = public_path() . '/product_image/';
                    $fullname = time().'-'.$name;
                    // dd($fullname);
                    $file->move($path, $fullname);
                    $images[]=url('/').'/public/product_image/'.$fullname;
                }
            }
            // dd($images);
            
            $productSave =   ProductModel::create([
                'image'      => implode(',',$images),
                'user_id'    => $request->user_id,
                'fk_category_id' => $request->fk_category_id,
                'name'           => $request->name,
                'mrp'            => $request->mrp,
                'selling_price'  => $request->selling_price,
                'quantitytype'=> $request->quantitytype,
                'quantity'=> $request->quantity,
                'details'        => $request->details,
            ]);
            //$productSave['image'] = $images;
            if($productSave){
                 return response()->json(['status'=>'1','data'=>$productSave],200);
                // return response()->json(['success' => 'Inserted','status'=>'1','data'=>$productSave ],200);
            }else{
                return response()->json(['error' => 'Error while saving','status'=>'0' ],200);
            }

        }
    }

    public function productList(Request $request)
    {
        // dd($request);
        
        $productList = ProductModel::select('tbl_products.*','tbl_category.name AS categoryname' )->leftJoin('tbl_category','tbl_category.id','=','tbl_products.fk_category_id')->where('tbl_products.user_id',$request->user_id)->get();
        foreach ($productList as $key => $value) {
            $images = $value->image;
            $value['image'] = explode(',',$images);
        }
        return response()->json(['product' => $productList],200);
    }

    public function productDetails(Request $request)
    {
        $productDetails = ProductModel::where('tbl_products.id',$request->id)
                        ->select(
                            'tbl_products.*',
                            'tbl_category.name AS categoryname'
                        )
                        ->leftJoin('tbl_category','tbl_category.id','=','tbl_products.fk_category_id')
                        ->first();
        if ($productDetails) {
            return response()->json(['success' => $productDetails],200);            
        }
        else{
            return response()->json(['error' => 'Id not found'],400);
        }
    }

    public function updateProductDetails(Request $request)
    {
        if (ProductModel::where('id', $request->id)->exists()) {
            $productDetails = ProductModel::where('id', $request->id)->first();
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $file1 = time().$file->getClientOriginalName();
                $path = public_path() . '/product_image/';
                $file->move($path, time().$file->getClientOriginalName());
                
                //return response()->json(['error' => 'Upload file not found'], 400);
            }
            if (!$request->hasFile('image')) {
                $file1 = $productDetails['image'];
            }
            

            ProductModel::where('id',$request->id)->update(array(
                'image'          => $file1,
                'fk_category_id' => $request->fk_category_id,
                'name'           => $request->name,
                'mrp'            => $request->mrp,
                'selling_price'  => $request->selling_price,
                'per_piece_price'=> $request->per_piece_price,
                'number_of_piece'=> $request->number_of_piece,
                'details'        => $request->details,    
            
            ));
            return response()->json(['message' => 'Updated'],200);
        }
        else{
            return response()->json(['error' => 'Id not found'],400);
        }
    }

    public function deleteProduct(Request $request)
    {
        if (ProductModel::where('id', $request->product_id)->exists()) {
            $file1 = ProductModel::where('id', $request->product_id)->first();
            // dd($file1);
            $images = explode(',',$file1->image);
            foreach ($images as $key) {
                $key = str_replace(url('/').'/',"",$key);
                //$destinationPath = 'public/product_image/';
                if(File::exists($key)) {
                    File::delete($key);
                }
                
            }
            ProductModel::where('id', $request->product_id)->delete();
            return response()->json(['status'=>'1','message' => 'your product has been delete'],200);
        }
        else{
            return response()->json(['status'=>'0','error' => 'Id not found'],200);
        }
    }
    public function imageupload(){

        $file_path = public_path() . '/product_image/';
        $actual_link = "http://$_SERVER[HTTP_HOST]/public/product_image/";
        // var_dump($actual_link);
        // die();
        
        $full_path=$file_path;
        // $response['message'] = $full_path;
        // echo json_encode($response);

        $img = $_FILES['file'];
        $response['message'] = "names : ";
        if(!empty($img)){

        for($i=0;$i<count($_FILES['file']['tmp_name']);$i++){

            $response['error'] = false;
            $response['message'] =  "number of files recieved is = ".count($_FILES['file']['name']);
            // echo json_encode($response);
            // die();
            if(move_uploaded_file($_FILES['file']['tmp_name'][$i],$full_path.$_FILES['file']['name'][$i])){
                $response['file'] = "http://$_SERVER[HTTP_HOST]/public/product_image/".$_FILES['file']['name'][$i];
                $response['error'] = false;
                $response['message'] =  $response['message']. "moved sucessfully ::  ";

            }else{
            $response['error'] = true;
            $response['message'] = $response['message'] ."cant move :::" .$file_path ;

            }
            }
        }  
        else{
            $response['error'] = true;
            $response['message'] =  "no files recieved !";
        }

        echo json_encode($response);
    }
    
        public function productShopList(Request $request)
    {
        
        $productShopList = ProductModel::select('tbl_products.*','tbl_category.name AS categoryname' )->leftJoin('tbl_category','tbl_category.id','=','tbl_products.fk_category_id')->where('tbl_products.user_id',$request->user_id)->get();
        foreach ($productShopList as $key => $value) {
            $images = $value->image;
            $value['image'] = explode(',',$images);
        }
        return response()->json(['product' => $productShopList],200);
    }
    
        public function productStock(Request $request)
    {
        $input = $request->all();
    
        $ProductModel = ProductModel::where('id', $input['product_id'])->update([
          'stock' => $input['stocktoggle'],
          ]);
          if($input['stocktoggle'] == "1"){
              return response()->json(['message' => "Product In Stock.."],200);
        }else{
            return response()->json(['message' => "Product Out of Stock.."],200);
        }
    }
}

