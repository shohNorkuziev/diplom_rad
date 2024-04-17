<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
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
    public function index(){
        $product=Category::all();
        $this->authUser();
        $data=(object)[
            'product'=>$product,
            'role'=>$this->user_role,
        ];
        return view('category.categories')->with(['data'=>$data]);
    }
    public function create(){
        $this->authUser();
        $data=(object)[
            'role'=>$this->user_role,
        ];
        if($data->role=='admin'){
            return view('category.create')->with(['data'=>$data]);
        }else{
            return view('layout.noaccess')->with(['data'=>$data]);
        }

    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>['required','max:125'],
        ]);
        if($validator->fails()){
            $msg='Ошибка при заполнении формы';
            return redirect()->route('categories.create')->with('success','Ошибка при заполнении формы');
        }else{
            Category::create($validator->validated());
            return redirect()->route('categories.index')->with('success','Товар добавлен');
        }
    }
    public function edit(string $id){
        $pro=Category::find($id);
        $this->authUser();
        $data=(object)[
            'role'=>$this->user_role,
        ];
        return view('category.edit',compact('pro'))->with(['data'=>$data]);
        if($data->role=='admin'){
            return view('category.edit',compact('pro'))->with(['data'=>$data]);
        }else{
            return view('layout.noaccess')->with(['data'=>$data]);
        }
    }
    public function update(Request $request,Category $category){
        $category->update($request->all());
        return  redirect()->route('categories.index')->with('success','Товар изменен');
    }
    public function destroy(string $id){
       $product=Category::find($id);
       $product->delete();
        return  redirect()->route('categories.index')->with('success','Товар Удален');
    }
}
