<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TamuController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('Admin.Tamu.index', compact('data'));
    }

    public function formTambah()
    {
        return view('Admin.Tamu.formTambah');
    }

    public function simpanData(Request $request)
    {
        $nama       = $request->nama;
        $telepon    = $request->telepon;
        $alamat     = $request->alamat;
        $email      = $request->email;

        $data = new User;
        $data->nama     = $nama;
        $data->tlp      = $telepon;
        $data->alamat   = $alamat;
        $data->email    = $email;
        $data->password = Hash::make('rahasia');

        $data->save();

        return redirect('admin/tamu')->with('status', 'Data Berhasil Disimpan');
    }

    public function formLogin()
    {
        return view('Admin.Tamu.formLogin');
    }

    public function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email'=> 'required',
            'password'=> 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password

        ];

        if(Auth::attempt($infologin)){
            return redirect('dashboard')->with('Email dan Password yang
            dimasukkan valid');

        }else{
            return redirect('admin/login')->withErrors('Email dan Password yang
            dimasukkan tidak valid');
        }
    }

    public function formEdit($id)
    {
        $data = User::find($id);
        return view('Admin.Tamu.formEdit', compact('data'));
    }

    public function updateTamu(Request $request)
    {
        $id         = $request->id;
        $nama       = $request->nama;
        $telepon    = $request->telepon;
        $alamat     = $request->alamat;
        $email      = $request->email;

        $data = User::find($id);
        $data->nama     = $nama;
        $data->tlp      = $telepon;
        $data->alamat   = $alamat;
        $data->email    = $email;
        $data->update();

        return redirect('admin/tamu')->with('status', 'Data Berhasil Diupdate');      
    }

    public function hapusTamu(Request $request)
    {
        $id = $request->id;
        $data =User::find($id);
        $data->delete();

        return redirect('admin/tamu')->with('status', 'Data Berhasil Dihapus');  
    }

    function do_sign_out(){
        Session::flush();
        return redirect('/');
    }

}
