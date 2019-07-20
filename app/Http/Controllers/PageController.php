<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Karyawan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function Login(){
        return view('login');
    }

    public function PostLogin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $karyawan = Karyawan::where('email_karyawan', $email)->first(); 
        if($karyawan && \Hash::check($password, $karyawan->password)) {
            $request->session()->put('users', $karyawan);
            return redirect('/karyawan/tiket');
        }
        
        $pelanggan = Pelanggan::where('email_pelanggan', $email)->first();
        if($pelanggan && \Hash::check($password, $pelanggan->password)) {
            $request->session()->put('users', $pelanggan);
            return redirect('/pelanggan/layanan');
        }

        if($email == 'admin@ticketing.id' && $password == '123123'){
            $request->session()->put('users', 'admin');
            return redirect('/admin/layanan');
        }
    }

    public function Logout(){
        Session::flush();
        return redirect('/login');
    }
}
