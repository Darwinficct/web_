<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AdministradorController extends Controller
{


   public function loginview(){
       return view('admin.login');
   }

   public function login(Request $request){
        $validatedData = $request->validate([
           'email'=>['required','max:30','exists:administrador,email'],
           'password' => ['required'],
       ]);

       $administrador = Administrador::where('email',$request->email)->first();

       if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->route('admin.menu');
       }
       return back()->withErrors(['error'=>'La contraseña es incorrecta']);

   }

   public function menu(){
       return view('admin.menu');
   }

   public function logout(){
       Auth::guard('admin')->logout();
       return redirect()->route('admin.login.view');
   }
}
