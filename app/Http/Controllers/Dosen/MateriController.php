<?php

namespace App\Http\Controllers\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Materi;
use Illuminate\Support\Facades\Storage;
use App\Models\video;

class MateriController extends Controller
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
        //di buat array utuk deskrip kode nya
        // 0 => "DPG.17.1C.12.A"
        // 1 => "894"
        // 2 => "201704121"
        $pecah=explode(',',Crypt::decryptString($id));

        // select video
        $video= video::where([
            'nip'       =>Auth::user()->username,
            'kd_mtk'    =>$pecah[1],
            'kd_lokal'  =>$pecah[0]
            ])->get();

        // sled pemblajaran
        $slide= DB::table('jadwal')->where([
            'nip'       =>Auth::user()->username,
            'kd_mtk'    =>$pecah[1]
            // 'kd_lokal'  =>$pecah[0]
            ])->first();
           //dd($slide);

        // select materi tambahan
        $materi= Materi::where([
            'nip'       =>Auth::user()->username,
            'kd_mtk'    =>$pecah[1],
            'kd_lokal'  =>$pecah[0]
            ])->get();

        return view('admin.materi.index',compact('materi','id','video','slide'));
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //create materi tambahan
        $pecah=explode(',',Crypt::decryptString($id));
        $w_cek=
        
        ['nip' =>Auth::user()->username,
        'kd_mtk'    =>$pecah[1],
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
            $materi = app('App\Models\Absen_ajar_praktek')->jadwal($where)->first();
        }else{
            $materi = app('App\Models\Absen_ajar_praktek')->jadwal($w_cek)->first();
        }
       
        return view('admin.materi.create',compact('materi'));
       
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //materi tambahan
        $this->validate($request, [

            'nip'         => 'required',
            'kd_dosen'    => 'required',
            'kd_mtk'      => 'required',
            'kd_lokal'    => 'required',
            'judul'       => 'required',
            'deskripsi'   => 'required',
            'file'        => 'required|file|mimes:pdf,|max:2500',
           
        ]);

        $file = $request->file('file');
        $file->storeAs('public/materi', $file->hashName());
        $materi = Materi::create([

            'nip'           => $request->input('nip'),
            'kd_dosen'      => $request->input('kd_dosen'),
            'kd_mtk'        => $request->input('kd_mtk'),
            'kd_lokal'      => $request->input('kd_lokal'),
            'judul'         => $request->input('judul'),
            'deskripsi'     => $request->input('deskripsi'),
            'file'          => $file->hashName()
           
        ]);

        $gabung=Crypt::encryptString($request->input('kd_lokal').
        ','.$request->input('kd_mtk').','.$request->input('nip'));
        if($materi){
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
    public function edit(Materi $materi)
    {
       // $materi=Materi::latest()->get();
        return view('materi.edit',compact('materi'));
    }

    public function edit_video(video $video)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materi $materi)
    {
        $this->validate($request, [
            'judul'       => 'required',
            'deskripsi'   => 'required',
            
        ]);

        if ($request->file('file') == "") {
            $materi = Materi::findOrfail($materi->id);
            $materi->update([


                'judul'         => $request->input('judul'),
                'deskripsi'     => $request->input('deskripsi')
            ]);
        } else {
            //hapus new image
            Storage::disk('local')->delete('public/materi/' . $materi->file);

            //uplaoad new gambar
            $file = $request->file('file');
            $file->storeAs('public/materi', $file->hashName());

            $materi = Materi::findOrFail($materi->id);
            $materi->update([
                'file'       => $file->hashName(),
                'judul'      => $request->input('judul'),
                'deskripsi'  => $request->input('deskripsi')
            ]);
        }
       
            //di balikin lagi ke index harus pake gabung, biar get nya dapet
        $gabung=Crypt::encryptString($request->input('kd_lokal').
        ','.$request->input('kd_mtk').','.$request->input('nip'));

        if($materi){
        return redirect('/materi/'.$gabung)->with('status','Data Ditambah');}
        else{
            return redirect('/materi/'.$gabung)->with('status','gagal');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        $cek= Materi::where([
            'id'       =>$materi->id
            ])->first();
            $gabung=Crypt::encryptString($cek->kd_lokal.','.$cek->kd_mtk.','.$cek->nip);
        Materi::destroy($materi->id);
        $file = Storage::disk('local')->delete('public/materi/' . $materi->file);
        return redirect('/materi/'.$gabung)->with('status','Data Dihapus');
    }

    public function download_file_materi(Request $request)
    {
        $files = public_path() . '/storage/materi/' . $request->file;//Mencari file dari model yang sudah dicari
        if(file_exists($files)){
            return response()->download($files, $request->file);
        }else{
            echo"kosong";
        }
        
    }

    public function download_file_ajarr(Request $request)
    {
        $files = public_path() . '/storage/materi/' . $request->file;//Mencari file dari model yang sudah dicari
        if(file_exists($files)){
            return response()->download($files, $request->file);
        }else{
            echo"kosong";
        }
        
        // dd($file);
        // $model_file = Absen_ajar::findOrFail($id); //Mencari model atau objek yang dicari
    }
    
}
