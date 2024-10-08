<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use App\Rules\customPasswordRule;

use Illuminate\Support\Facades\DB;
use App\Models\Customer_Model;
use App\Models\User;
use Auth;

class Login extends Controller
{
    public function __construct(){
        // parent::__construct();
    }
   
    public function index(){
        if(View::exists("login")){
            return view("login");
        }
    }

    public function signup(){
        if(View::exists("signup")){
            return view("signup");
        }
    }

    public function signupUser(Request $request){
        $request->validate(
            [
                "username" => ["required","min:3","alpha_num","unique:users,username"],
                "email" => ["required","unique:users,email"],
                "password" => ["required","min:3","max:10","alpha_num",]
            ]
        );

        if(User::addUser($request->username,$request->email,$request->password)){
            return redirect("login");
        }
    }

    public function login1(Request $request){
        $request->validate(
            [
                "username" => ["required","min:3","alpha_num"],
                "password" => ["required","min:3","max:10","alpha_num"]
            ]
        );

        if(Auth::attempt(['username' => $request->username, 'password' => $request->password],request()->filled('remember_me'))){
            return redirect("dashboard");
        }else{
            return redirect("login");
        }
    }


    public function loginApp(Request $request){
        $user = User::where('email',request("email"))->first();
        if(Hash::check(request("password"), $user->getAuthPassword())){
            return [
                'token' => $user->createToken(time())->plainTextToken
            ];
        }
    }

    // Old Login Code using Model based query authentication
    // public function userLogin(Request $req){
        
    //     $req->validate(
    //         [
    //             "username" => ["required","min:3","alpha_num"],
    //             "password" => ["required","min:3","max:10","alpha_num"]
    //         ]
    //     );

    //     $data = Customer_Model::authUser($req->username,$req->password);

    //     if(!empty($data)){
    //         $this->makeLoginSession($data->id);
    //         $req->session()->flash("login",true);
    //         return redirect("/dashboard");
    //     }else{
    //         $req->session()->flash("login",false);
    //         return redirect()->back()->withErrors(["username" => "Invalid Credentails"]);
    //     }
    // }

    // private function makeLoginSession($user_id = null){
    //     if(!is_null($user_id)) session(["user_id" => $user_id]);
    // }
    // Old Login Code using Model based query authentication
}
