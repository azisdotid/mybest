<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class DosenInfoController extends Controller
{
    public function __construct()
    {
        if(!$this->middleware('auth:sanctum')){
            return redirect('/login');
        }
    }


    public function index()
    {
        // $berita= Berita::select('Announce_story')
        // ->limit(1)
        // ->get();
        if (Auth::user()->username=='202103289') {
            //  $berita= Berita::limit(1)->get();
            //   $berita = DB::connection('mysql2')->table("personal_berita")->get();
        // dd($berita);
        }
     

        return view('admin.dashboard');
    }
}
