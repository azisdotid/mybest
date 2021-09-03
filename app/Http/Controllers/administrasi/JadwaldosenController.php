<?php

namespace App\Http\Controllers\administrasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwaldosenController extends Controller
{
    public function __construct()
    {
       $this->middleware(['permission:jadwaldosen_adm.index']);
       if(!$this->middleware('auth:sanctum')){
        return redirect('/login');
        }
    }
    public function index()
    {
        $jadwal = DB::table('jadwal')
        ->when(request()->q, function ($jadwal) {
        $jadwal = $jadwal->where('kd_dosen', 'like', '%' . request()->q . '%');
        })->paginate(10);

        return view('administrasi.jadwal.index',compact('jadwal'));
    }
}
