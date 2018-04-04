<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use App\Slide;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex(){
        $slider = Slide::all();
        $new_product=Product::where('new',1)->paginate(4);
        $top_product=Product::where('promotion_price','!=',0)->paginate(8);
        return view('page.trangchu',compact('slider','new_product','top_product'));
    }

    public function getProductType($type){
        $product_type=Product::where('id_type',$type)->paginate(3);
        $other_product=Product::where('id_type','<>',$type)->paginate(3);
        $type=ProductType::where('id',$type)->first();
        $other_type=ProductType::where('id','<>',$type)->get();
        return view('page.loai-san-pham',compact('product_type','other_product','type','other_type'));
    }
    public function getProductDetail(Request $req){
        $product_detail=Product::where('id',$req->id)->first();
        return view('page.chi-tiet-san-pham',compact('product_detail'));
    }

    public function getContact(){
        return view('page.lien-he');
    }

    public function getAbout(){
        return view('page.gioi-thieu');
    }

    public function getDangKy(){
        return view('page.dangky');
    }

    public function getSignup(Request $req){
        $this->validate($req,[
            'email'=>'required|email|unique:users,email',
            'fullname'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'password'=>'required|min:6|max:20',
            're_password'=>'required|same:password'
        ],[

            'email.email'=>'Không đúng định dạng email',
            'email.unique'=>'Email đã được sử dụng',
            'fullname.required'=>'Vui lòng nhập tên đầy đủ',
            'address.required'=>'Vui lòng nhập địa chỉ',
            'phone.required'=>'Vui lòng nhập điện thoại',
            'password.required'=>'Vui lòng nhập password',
            'password.min'=>'Mật khẩu phải ít nhất 6 kí tự và nhỏ hơn 20 kí tự',
            're_password.required'=>'Vui lòng nhập password',
            're_password.same'=>'Mật khẩu nhập lại không đúng'
        ]);

        $user= new User();
        $user->email=$req->email;
        $user->full_name=$req->fullname;
        $user->address=$req->address;
        $user->phone=$req->phone;
        $user->password=Hash::make($req->password);
        $user->save();
        return redirect()->back()->with('success','Tạo tài khoản thành công');
    }

    public function getLogin(){
        return view('page.dangnhap');
    }

    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mk ít nhất 6 kí tự',
                'password.max'=>'Mk tối đa 20 kí tự'
            ]);
        $data=['email'=>$req->email,'password'=>$req->password];
        if(Auth::attempt($data)){
            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->route('index');
    }

    public function getSearch(Request $req){

        $product_s=Product::where('name','like','%'.$req->key.'%')
                        ->orWhere('unit_price',$req->key)->get();
        return view('page.tim-kiem',compact('product_s'));
    }


}