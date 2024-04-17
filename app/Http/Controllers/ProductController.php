<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public $user_id;
    public $user_role;

    public function authUser(){
        if(Auth::check()){
            $user=Auth::user();
            $this->user_id=$user->id;
            $this->user_role=$user->role;
        }else{
            $this->user_role='quest';
        }
    }
    public function sort(Request $request,$id,$sort){
        $request->session()->flash('sort',$sort);
        return redirect()->route('catalog',['id'=>$id]);
    }
    public function catalog(Request $request){
        $this->authUser();

        if($request->session()->get('sort')=='name'){
            $product=Product::with('category')->where('qty','!=',0)->orderBy('name','DESC')->get();
        }
        elseif($request->session()->get('sort')=='price'){
            $product=Product::with('category')->where('qty','!=',0)->orderBy('price','ASC')->get();
        }
        else{
            $product=Product::with('category')->where('qty','!=',0)->latest()->get();
        }
        $category=Category::all();
        // $product=Product::where('qty','!=',0)->get();
        $data=(object)[
            'product'=>$product,
            'role'=>$this->user_role,
            'category'=>$category,
        ];
        return view('product.products')->with(['data'=>$data]);
    }
    public function show(Request $request, $id){
        $product=Product::find($id);
        $category=Category::find($product->category_id)->name;
        $this->authUser();
        $data=(object)[
            'id'=>$product->id,
            'name'=>$product->name,
            'price'=>$product->price,
            'image'=>$product->image,
            'description'=>$product->description,
            'category'=>$product->category->name,
            'role'=>$this->user_role,
        ];
        return view('product.show')->with(['data'=>$data]);
    }
    public function create(){
        $category=Category::all();
        $this->authUser();
        $data=(object)[
            'role'=>$this->user_role,
        ];
        if($data->role=='admin'){
            return view('product.create')->with(['category'=>$category,'data'=>$data]);
        }else{
            return view('layout.noaccess')->with(['data'=>$data]);
        }
    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>['required','max:125'],
            'price'=>'required',
            'qty'=>'required',
            'image'=>'required|file|mimes:png,jpg,jpeg,svg,webp',
            'description'=>'nullable',
            'category_id'=>'required'
        ]);
        if($validator->fails()){
            $msg='Ошибка при заполнении формы';
            return redirect()->route('products.create')->with('success','Ошибка при заполнении формы');
        }else{
            $image_name=time().'.'.$request->file('image')->extension();
            $path='images/products/';
            $request->file('image')->move(public_path($path),$image_name);
            Product::create([
                'image'=>$path.$image_name
            ]+$validator->validated());
            return redirect()->route('catalog')->with('success','Товар добавлен');
        }
    }
    public function edit(string $id){
        $category=Category::all();
        $pro=Product::find($id);
        $this->authUser();
        $data=(object)[
            'role'=>$this->user_role,
        ];
        if($data->role=='admin'){
            return view('product.edit',compact('pro'))->with(['category'=>$category,'data'=>$data]);
        }else{
            return view('layout.noaccess')->with(['data'=>$data]);
        }
    }
    public function update(Request $request,Product $product){
        $product->update($request->all());
        return  redirect()->route('catalog')->with('success','Товар изменен');
    }
    public function destroy(string $id){
       $product=Product::find($id);
       $product->delete();
        return  redirect()->route('catalog')->with('success','Товар Удален');
    }
}
