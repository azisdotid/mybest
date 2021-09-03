<?php

namespace App\Models\mhs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\JoinClause;

class Jadwalmhs extends Model
{
    public function jadwal($kd_lokal,$nim)
    {
        
        // dd($kd_lokal);
        return DB::table('penilaian')
        ->select('penilaian.kel_praktek','penilaian.nim','penilaian.kd_mtk','jadwal.*' )
        // ->leftJoin('mtk','penilaian.kd_mtk', '=', 'mtk.kd_mtk')
        ->LeftJoin('jadwal','penilaian.kd_mtk', '=', 'jadwal.kd_mtk')
        ->where('penilaian.kel_praktek','=','')
        ->where('jadwal.kd_lokal',$kd_lokal)
        ->where('penilaian.nim',$nim); 

    }
    public function jadwal_pengganti($kd_lokal,$nim)
    {
        
        // dd($kd_lokal);
        return DB::table('penilaian')
        ->select('penilaian.kel_praktek','penilaian.nim','penilaian.kd_mtk','kuliah_pengganti.*' )
        // ->leftJoin('mtk','penilaian.kd_mtk', '=', 'mtk.kd_mtk')
        ->LeftJoin('kuliah_pengganti','penilaian.kd_mtk', '=', 'kuliah_pengganti.kd_mtk')
        ->where('penilaian.kel_praktek','=','')
        ->where('kuliah_pengganti.kd_lokal',$kd_lokal)
        ->where('penilaian.nim',$nim); 

    }
    public function jadwal_praktek($kd_lokal,$nim)
    {
        
        // dd($kd_lokal);
        return DB::table('penilaian')
        ->select('penilaian.kel_praktek','penilaian.nim','penilaian.kd_mtk','jadwal.*' )
        // ->leftJoin('mtk','penilaian.kd_mtk', '=', 'mtk.kd_mtk')
        ->join('jadwal','penilaian.kel_praktek', '=', 'jadwal.kel_praktek')
        ->where('penilaian.kel_praktek','<>','')
        ->where('jadwal.kd_lokal',$kd_lokal)
        ->where('penilaian.nim',$nim); 

    }
    public function jadwal_praktek_pengganti($kd_lokal,$nim)
    {
        
        // dd($kd_lokal);
        return DB::table('penilaian')
        ->select('penilaian.kel_praktek','penilaian.nim','penilaian.kd_mtk','kuliah_pengganti.*' )
        // ->leftJoin('mtk','penilaian.kd_mtk', '=', 'mtk.kd_mtk')
        ->join('kuliah_pengganti','penilaian.kel_praktek', '=', 'kuliah_pengganti.kel_praktek')
        ->where('penilaian.kel_praktek','<>','')
        ->where('kuliah_pengganti.kel_praktek', 'like', "%".$kd_lokal."%")
        ->where('penilaian.nim',$nim); 

    }
    public function jadwal_gabung_pengganti($kd_lokal,$nim)
    {
        
        // dd($kd_lokal);
        return DB::table('penilaian')
        ->select('penilaian.kel_praktek','penilaian.nim','penilaian.kd_mtk','kuliah_pengganti.*' )
        // ->leftJoin('mtk','penilaian.kd_mtk', '=', 'mtk.kd_mtk')
        ->join('kuliah_pengganti','penilaian.kd_mtk', '=', 'kuliah_pengganti.kd_mtk')
        // ->where('penilaian.kd_gabung','<>','')
        ->where('kuliah_pengganti.detail_gabung', 'like', "%".$kd_lokal."%")
        // ->where('kuliah_pengganti.kd_lokal',$kd_lokal)
        ->where('penilaian.nim',$nim); 

    }
    public function rekap_absen($id)
    {
        $exp = explode(",",Crypt::decryptString($id));
        $where=['a.kel_praktek'=>$exp[4],'a.kd_mtk'=>$exp[0],'b.nim'=>Auth::user()->username];
        return DB::table('absen_ajar_prakteks as a')
        ->select('a.tgl_ajar_masuk as tgl_ajar_masuk','a.nm_mtk as nm_mtk','a.pertemuan as pertemuan','a.berita_acara as berita_acara','a.rangkuman as rangkuman','b.status_hadir as status_hadir')
        ->LeftJoin('absen_mhs as b', 'a.kel_praktek', '=', 'b.kel_praktek')
        ->where($where);
    }
    // public function cek_ajar($kd_lokal,$nim)
    // {
    //     return DB::table('absen_ajar')
    //     ->where('kd_lokal',$kd_lokal)
    //     ->where('penilaian.nim',$nim)
    //     ->get(); 
    // }
    // public function absen_ajar($kd_lokal,$tgl)
    // {

    //         $ajar= DB::table('absen_ajars')
    //         ->where('kd_lokal',$kd_lokal)
    //         ->where('tgl_ajar_masuk',$tgl); 
    //     if($ajar->count()>0){
    //         foreach($ajar->get() as $i){
    //             $h[$i->kd_mtk]=$i;
    //     }
    //     return $h;
    // }
    // else
    // {
    // return $ajar->get();
    // }

    // }

    // public function absen_ajar_praktek($kd_lokal,$tgl)
    // {
    //     $jadwal = DB::table('jadwal')
    //     ->where('kd_lokal',$kd_lokal)->first();
    //     dd($jadwal);
    //         $ajar= DB::table('absen_ajar_prakteks')
    //         ->where('kel_praktek',$jadwal->kel_praktek)
    //         ->where('tgl_ajar_masuk',$tgl); 
    //     if($ajar->count()>0){
    //         foreach($ajar->get() as $i){
    //             $h[$i->kd_mtk]=$i;
    //     }
    //     return $h;
    // }
    // else
    // {
    // return $ajar->get();
    // }

    // }


}
