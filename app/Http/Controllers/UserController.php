<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
    public function index()
    {
        $data=(object)[
            'users' => User::all(),
        ];
        return view('auth.index')->with(['data'=>$data]);
    }
    public function home(){
        $this->authUser();
        $data=(object)[
            'role'=>$this->user_role,
        ];
        return view('layout.layouts')->with(['data'=>$data]);
    }
    public function basket(Request $request){
        $this->authUser();
        $test=[];
        $basket=[];
        $request->session()->put('basket', [['id'=>5,'qty'=>2],['id'=>6,'qty'=>2]]);
        if($request->session()->has('basket')){
            $value = $request->session()->get('basket');
            foreach ($value as $key => $value) {
                $product=Product::find($value['id']);
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
                    'qty'=>$value['qty'],
                ];
                array_push($basket, $data);
                array_push($test, $value);
            }
        }
        $data=(object)[
            'test'=>$test,
            'basket'=>$basket,
            'role'=>$this->user_role,
        ];
        return view('purchase.basket')->with(['data'=>$data]);
    }
    public function info(){
        $this->authUser();
        $data=(object)[
            'role'=>$this->user_role,
        ];
        return view('layout.info')->with(['data'=>$data]);
    }
    public function create(){
        $this->authUser();
        $data=(object)[
            'role'=>$this->user_role,
        ];
        return view('auth.reg')->with(['data'=>$data]);
    }
    public function store(Request $request){
        if (!auth()->user()->role == 'admin') {
            abort(403);
        }
        $password = $request->input('admin-password');
        if (!Hash::check($password, Auth::user()->password)) {
            return redirect()->back()->withErrors(['password' => 'Неверный пароль']);
        }
        $validator=Validator::make($request->all(),[
            'firstname'=>['required','alpha'],
            'lastname'=>['required','alpha'],
            'patronymic'=>['nullable'],
            'email'=>['email','unique:users'],
            'password'=>['required','min:6'],
            'role'=>'required'
        ]);
        if($validator->fails()){
            return redirect()->route('create')->with('success','Ошибка при создании сотрудника');
        }
        else{
            User::create($validator->validated());
            return redirect()->route('home')->with('success','Сотрудник добавлен');
        }
    }
    public function login(){
        $this->authUser();
        $data=(object)[
            'role'=>$this->user_role,
        ];
        return view('auth.auth')->with(['data'=>$data]);
    }
    public function signup(Request $request){
        if(Auth::attempt($request->only(['email','password']))){
            return redirect()->route('info')->with('success','Вы авторизованы');
        }
        else{
            return redirect()->route('login')->with('success','Ошибка авторизации');
        }
    }
    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect()->route('info')->with('success','Вы вышли');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success','Сотрудник удален');
    }
}
