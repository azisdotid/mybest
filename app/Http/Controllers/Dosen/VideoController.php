<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;


class VideoController extends Controller
{
    public function __construct()
    {
        if(!$this->middleware('auth:sanctum')){
            return redirect('/login');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pecah=explode(',',Crypt::decryptString($id));
        $w_cek=
        
        ['nip' =>Auth::user()->username,
        'kd_mtk'     =>$pecah[1],
        'kd_gabung'  =>$pecah[0]
        ];
        $cek = app('App\Models\Absen_ajar_praktek')->jadwal($w_cek)->count();

        if($cek<1){
        $where=
            [
            'nip' =>Auth::user()->username,
            'kd_mtk'    =>$pecah[1],
            'kd_lokal'  =>$pecah[0]
            ];
            $video = app('App\Models\Absen_ajar_praktek')->jadwal($where)->first();
        }else{
            $video = app('App\Models\Absen_ajar_praktek')->jadwal($w_cek)->first();
        }
       
        return view('admin.materi.create-video',compact('video'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //video tambahan
          $this->validate($request, [

            'nip'         => 'required|numeric',
            'kd_dosen'    => 'required',
            'kd_mtk'      => 'required|numeric',
            'kd_lokal'    => 'required',
            'judul'       => 'required',
            'deskripsi'   => 'required',
            'isi'         => 'required',
           
        ]);

        $video = video::create([

            'nip'           => $request->input('nip'),
            'kd_dosen'      => $request->input('kd_dosen'),
            'kd_mtk'        => $request->input('kd_mtk'),
            'kd_lokal'      => $request->input('kd_lokal'),
            'title_video'   => $request->input('judul'),
            'des'           => $request->input('deskripsi'),
            'link_code'     => $request->input('isi')

        ]);

        $gabung=Crypt::encryptString($request->input('kd_lokal').
        ','.$request->input('kd_mtk').','.$request->input('nip'));
        if($video){
        return redirect('/materi/'.$gabung)->with('status','Data Ditambah');}
        else{
            return redirect('/materi/'.$gabung)->with('error','Gagal Ditambah');
        }
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
    public function destroy(Video $video)
    {
        $cek= video::where([
            'id'       =>$video->id
            ])->first();
            $gabung=Crypt::encryptString($cek->kd_lokal.','.$cek->kd_mtk.','.$cek->nip);
        video::destroy($video->id);
        return redirect('/materi/'.$gabung)->with('status',' Video Dihapus');
    }
}
