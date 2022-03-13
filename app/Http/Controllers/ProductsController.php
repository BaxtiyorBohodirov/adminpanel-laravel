<?php

namespace App\Http\Controllers;

use App\Models\Produts;
use Facade\FlareClient\Stacktrace\File;
use GuzzleHttp\Psr7\UploadedFile;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Console\Input\Input;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products=Produts::all();
        return view('admin.products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=$request->validate([
            'image'=>'required',
            'name'=>'required',
            'title'=>'required',
            'price'=>'required',
            'status'=>'required',
            'order'=>'required',
        ]);
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $name=$file->hashName();
            $path=Storage::putFile('public/images/products',$file);
            $product['image']=$path;
        }
        if(Produts::create($product))
        {
            $products=Produts::all();
            return view('admin.products.index',['products'=>$products]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Produts::find($id);
        return view('admin.products.view',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Produts::find($id);
        return view('admin.products.create',['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=$request->validate([
            'image'=>'required',
            'name'=>'required',
            'title'=>'required',
            'price'=>'required',
            'status'=>'required',
            'order'=>'required',
        ]);
        $productOld=Produts::find($id);
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $name=$file->hashName();
            if(Storage::exists($productOld->image))
            {
                Storage::delete($productOld->image);
            }
            $path=Storage::putFile('public/images/products',$file);
            $product['image']=$path;
        }
        if(Produts::find($id)->update($product))
        {
            $products=Produts::all();
            return view('admin.products.index',['products'=>$products]);
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Produts::destroy($id))
        {
            return view('admin.products.index',['products'=>Produts::all()]);
        }
        return back();
    }
    public function search(Request $request)
    {   
        if($request->session()->has('product'))
        {
            $arr=$request->session()->get('product');
            $request->session()->forget('product');
            $products=Produts::where($arr[0]['name'],'LIKE','%'.$arr[0]['value'].'%');
            foreach($arr as $item)
            {
               $products=$products->where($item['name'],'LIKE','%'.$item['value'].'%');
            }
            return view('admin.products.index',['products'=>$products->get(),'inputs'=>$arr]);
        }
        return redirect()->route('products.index');
    }
    public function setSession(Request $request)
    {   
        $request->session()->put('product',$request->arr);
        return ['type'=>'success'];
    }
}
