<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function index(){

        // $affected = DB::table('users')
        //       ->where('id', 1)
        //       ->update(['name' => 'mehedi hassan mamun']);

        // DB::table('users')->where('id',1)->delete();
        // $users = DB::table('users')->select('name', 'email as user_email','password')->get();
        // return $users;dd($user);

        // $user = new User();
        // $user->name='ashis';
        // $user->email ='ashdsk@gmail.com';
        // $user->password='adajdc';
        // $user->save();

        $user=User::all();
        return $user;
        return view('home');
    }
}
