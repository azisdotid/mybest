<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Absen_ajar_praktek;
use App\Models\Absen_ajar;


class RekapajardosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rekap_ajar.index');
        
    }
    public function index_t()
    {
       
        $rekapajar_t = DB::table('absen_ajars')
        ->where([
                  
            'nip' =>Auth::user()->username

                    ])->get();

        //dd($rekapajar_t);

        return view('admin.rekap_ajar.rekap_teori',compact('rekapajar_t'));
    }

    public function index_p()
    {
       
        $rekapajar_p = DB::table('absen_ajar_prakteks')
        ->where([
                  
            'nip' =>Auth::user()->username

                    ])
        ->get();

        // dd($rekapajar_p);

        return view('admin.rekap_ajar.rekap_praktek',compact('rekapajar_p'));
    }
    
    public function alasan_p($id)
    {
        // echo $id;
        $request = explode(",",Crypt::decryptString($id));
        $ajp=Absen_ajar_praktek::where(['kel_praktek'=>$request[0],'kd_mtk'=>$request[1],'pertemuan'=>$request[2],'nip'=>Auth::user()->username])->first();
        // dd($ajp);
        return view('admin.rekap_ajar.alasan_praktek',compact('request','ajp'));
    }
    public function alasan_t($id)
    {
        // echo $id;
        $request = explode(",",Crypt::decryptString($id));
        $ajp=Absen_ajar::where(['kd_lokal'=>$request[0],'kd_mtk'=>$request[1],'pertemuan'=>$request[2],'nip'=>Auth::user()->username])->first();
        // dd($ajp);
        return view('admin.rekap_ajar.alasan_teori',compact('request','ajp'));
    }

    public function alasan_prodi_praktek(Request $request)
    {
        // dd($request->alasan);
        Absen_ajar_praktek::where(['kel_praktek'=>$request->kel_praktek,'kd_mtk'=>$request->kd_mtk,'pertemuan'=>$request->pertemuan,'nip'=>Auth::user()->username])
      ->update(['alasan' => $request->alasan]);
      return redirect('/lecturer/p/rekap')->with('status','memberikan alasan');
    }
    public function alasan_prodi_teori(Request $request)
    {
        // dd($request->alasan);
        Absen_ajar::where(['kd_lokal'=>$request->kel_praktek,'kd_mtk'=>$request->kd_mtk,'pertemuan'=>$request->pertemuan,'nip'=>Auth::user()->username])
      ->update(['alasan' => $request->alasan]);
      return redirect('/lecturer/t/rekap')->with('status','memberikan alasan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
