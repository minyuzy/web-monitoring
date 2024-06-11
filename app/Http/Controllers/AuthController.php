<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Lansia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{



    public function register(Request $request)
    {
        $getUser = DB::table("users")->where("email", $request->email)->first();
        if ($getUser != null) {
            return redirect("/registerIndex")->with("failed", "email sudah terdaftar");
        }

        $data_user =  User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            'remember_token' => Str::random(60),
            "role" => "user",
        ]);





        return redirect("/loginIndex")->with("success", "Berhasil Mendaftar");
    }

    public function login(Request $request)
    {


        $data = DB::table("users")->where("email", $request->email)->first();

        if ($data == null) {

            return redirect("/loginIndex")->with("failed", "gagal login");
        }

        if (Hash::check($request->password, $data->password)) {

            $request->session()->put('name', $data->name);
            $request->session()->put('role', $data->role);
            $request->session()->put('id', $data->id);

            $request->session()->put('remember_token', $data->remember_token);

            return redirect("/")->with("success", $request->session()->get("remember_token"));
        }



        return redirect("/loginIndex")->with("failed", "gagal login");
    }


    public function logout(Request $request)
    {
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("failed", "gagal login");
        }
        $request->session()->flush();
        return redirect("/loginIndex")->with("success", "berhasil logout");
    }
}
