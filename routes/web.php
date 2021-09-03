<?php
namespace App\Http\Controllers\Dosen;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenInfoController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\administrasi\KuliahpenggantiController;
use App\Http\Controllers\administrasi\InputmanualController;
use App\Http\Controllers\baak\UploadjadwalController;
use App\Http\Controllers\mhs\JadwalmhsController;
use App\Http\Controllers\mhs\MaterimhsController;
use App\Http\Controllers\mhs\TugasmhsController;
use App\Http\Controllers\mhs\DiskusimhsController;

use App\Http\Controllers\baak\MhsController;
use App\Http\Controllers\baak\KpbaakController;
use App\Http\Controllers\baak\PertemuanController;
use App\Http\Controllers\baak\PenilaianController;

//administrasi
use App\Http\Controllers\administrasi\Select2SearchController;
use App\Http\Controllers\administrasi\UserdosenController;
use App\Http\Controllers\administrasi\UsermhsController;
use App\Http\Controllers\administrasi\JadwaldosenController;
use App\Http\Controllers\administrasi\RekapdosenController;


use App\Http\Livewire\Post\Index;
use App\Http\Livewire\Post\Create;
use App\Http\Livewire\Post\Edit;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::livewire('/', 'post.index')->name('post.index');
// Route::get('/' , [Index::class,'render']);
// Route::get('/create', [Create::class,'render'])->name('post.create');
// Route::post('/save', [Create::class,'store']);
// Route::get('/edit/{id}', [Edit::class,'edit'])->name('post.edit');

Route::get('/', function () {
    return view('welcome');
});


//rout kusus dosen
 Route::group(['middleware' => 'auth:sanctum', 'verified','authadmin'], function () {  
    Route::group(['middleware' => 'cekdosen'], function () {           
        
// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->name('dashboard');

Route::get('/dashboard', [DosenInfoController::class, 'index']);



 //pengaturan user
 Route::get('/profil', [ProfilController::class, 'index']);
 Route::get('/user', [UserController::class, 'index'])->name('user.index');
 Route::get('/adm/user', [UserController::class, 'adm']);

  
 Route::get('/muser', [UserController::class, 'mhsuser'])->name('user.mhsuser');
 Route::get('/muser/json', [UserController::class, 'jsonusermhs'])->name('user.index');
 Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
 Route::post('/user', [UserController::class, 'store'])->name('user.index');
 Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
 Route::patch('/user/update/{user}', [UserController::class,'update']);
 Route::delete('/hapus-user/{user}',[UserController::class, 'destroy']);

// Route::get('/pertemuan', [PertemuanController::class,'index']);
// Route::get('/pertemuan/json', [PertemuanController::class,'datajson']);

//permissions
Route::get('/permission', [PermissionController::class, 'index'])->name('permission.index');
Route::get('/permission/json', [PermissionController::class, 'jsonpermission'])->name('permission.index');
Route::get('/permission/create', [PermissionController::class, 'create'])->name('permission.create');
Route::post('/permission', [PermissionController::class, 'store'])->name('permission.index');

 //pengaturan akses role
 Route::get('/role', [RoleController::class, 'index'])->name('role.index');
 Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
 Route::post('/role', [RoleController::class, 'store'])->name('role.index');
 Route::get('/role/edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
 Route::patch('/role/update/{role}', [RoleController::class,'update']);
 

//baak pertemuan
Route::get('/pertemuan', [PertemuanController::class,'index']);
Route::get('/pertemuan/json', [PertemuanController::class,'datajson']);
Route::post('/pertemuan1', [PertemuanController::class,'storeData']);
//baak penilian /krs
Route::get('/krs', [PenilaianController::class,'index']);
Route::get('/krs/json', [PenilaianController::class,'datajson']);
Route::post('/krs1', [PenilaianController::class,'storeData']);

//baak penilian /krs
Route::get('/mhs', [MhsController::class,'index']);
Route::get('/mhs/json', [MhsController::class,'datajson']);
Route::post('/mhs1', [MhsController::class,'storeData']);

//BAAK Cek Kuliah Pengganti
Route::get('/cek-kuliah-pengganti-baak', [KpbaakController::class,'index']);
Route::post('/cek-kuliah-pengganti-baak', [KpbaakController::class,'index']);
Route::get('/pengganti-side-baak/{id}', [KpbaakController::class,'pengganti_side']);
Route::get('/acc-pengganti-baak/{id}', [KpbaakController::class,'acc_pengganti']);
//BAAK Mahasiswa
Route::get('/std/users/baak', [UsermhsController::class, 'index_baak']);
Route::get('/std/edit/baak/{user}', [UsermhsController::class, 'edit_baak']);
Route::patch('/std/update/baak/{user}', [UsermhsController::class,'update_baak']);

//Mengajar Praktek
 Route::get('/jadwal', [Jadwal_mengajarController::class, 'index']);
Route::post('/absen-mhs-praktek', [Absen_mhsController::class, 'store_praktek']);
Route::get('/ajar-praktek/{id}', [Jadwal_mengajarController::class, 'ajar_praktek']);
Route::post('/create-praktek', [Jadwal_mengajarController::class, 'store_praktek']);
Route::post('/berita-acara-praktek', [Absen_mhsController::class, 'bap_praktek']);
Route::post('/absen-keluar-praktek', [Jadwal_mengajarController::class, 'absen_keluar_praktek']);
//Mengajar Teori
Route::post('/absen-mhs-teori', [Absen_mhsController::class, 'store_teori']);
Route::get('/ajar-teori/{id}', [Jadwal_mengajarController::class, 'ajar_teori']);
Route::post('/create-teori', [Jadwal_mengajarController::class, 'store_teori']);
Route::post('/berita-acara-teori', [Absen_mhsController::class, 'bap_teori']);
Route::post('/absen-keluar', [Jadwal_mengajarController::class, 'absen_keluar']);
//Mengajar Gabung
Route::post('/absen-mhs-gabung', [Absen_mhsController::class, 'store_gabung']);
Route::post('/create-gabung', [Jadwal_mengajarController::class, 'store_gabung']);
Route::get('/ajar-gabung/{id}', [Jadwal_mengajarController::class, 'ajar_gabung']);
Route::post('/berita-acara-gabung', [Absen_mhsController::class, 'bap_gabung']);
Route::post('/absen-keluar-gabung', [Jadwal_mengajarController::class, 'absen_keluar_gabung']);
//Jadwal Pengganti
Route::post('/create-teori-pengganti', [Jadwal_penggantiController::class, 'store_teori_pengganti']);
Route::post('/create-praktek-pengganti', [Jadwal_penggantiController::class, 'store_praktek_pengganti']);
Route::post('/create-gabung-pengganti', [Jadwal_penggantiController::class, 'store_gabung_pengganti']);
Route::get('/ajar-teori-pengganti/{id}', [Jadwal_penggantiController::class, 'ajar_teori_pengganti']);
Route::get('/ajar-praktek-pengganti/{id}', [Jadwal_penggantiController::class, 'ajar_praktek_pengganti']);
Route::get('/ajar-gabung-pengganti/{id}', [Jadwal_penggantiController::class, 'ajar_gabung_pengganti']);
Route::post('/absen-keluar-praktek-pegganti', [Jadwal_penggantiController::class, 'absen_keluar_praktek']);

//upload materi
Route::get('/materi/{id}', [MateriController::class,'index'])->name('materi.index');
Route::get('/materi-create/{id}', [MateriController::class,'create'])->name('materi.create');
Route::post('/materi', [MateriController::class,'store'])->name('materi.index');
Route::get('/materi/{materi}/edit', [MateriController::class,'edit'])->name('materi.edit');
Route::patch('/materi-update/{materi}', [MateriController::class,'update']);
// Route::post('/download-file-materi', [Jadwal_mengajarController::class, 'download_file_materi']);
Route::post('/download-file-ajarr', [MateriController::class, 'download_file_ajarr']);
Route::delete('/hapus-materi/{materi}',[MateriController::class, 'destroy']);

//video pemblajaran
Route::get('/video-create/{id}', [VideoController::class,'create'])->name('materi.create-video');
Route::post('/materi-store', [VideoController::class,'store'])->name('materi.index');
Route::delete('/hapus-video/{video}',[VideoController::class, 'destroy']);

//Download File
Route::post('/download-file-ajar', [Jadwal_mengajarController::class, 'download_file_ajar']);
Route::post('/download-file-diskusi', [DiskusiController::class, 'download_file_diskusi']);
//tugas
Route::get('/tugas/{id}', [TugasController::class,'index'])->name('tugas.index');
Route::get('/tugas-create/{id}', [TugasController::class,'create'])->name('tugas.create');
Route::get('/tugas-show/{id}', [TugasController::class,'show'])->name('tugas.show');
Route::post('/tugas', [TugasController::class,'store'])->name('tugas.index');
Route::post('/download-file-tugas-dosen', [TugasController::class, 'download_file_tugas']);
Route::delete('/hapus-tugas/{tugas}',[TugasController::class, 'destroy']);
Route::post('/send-tugas', [TugasController::class,'send_tugas']);

//Forum Diskusi
Route::get('/form-diskusi/{id}', [DiskusiController::class,'index']);
Route::post('/tambah-diskusi', [DiskusiController::class,'store_diskusi']);
Route::delete('/hapus-diskusi/{id}', [DiskusiController::class,'destroy_diskusi']);
Route::get('/form-komentar/{id}', [DiskusiController::class,'komentar']);
Route::post('/send-komentar', [DiskusiController::class,'store_komen']);
//Rekap Absen Praktek
Route::get('/rekap-absen', [Rekap_absenController::class,'index']);
Route::post('/rekap-praktek', [Rekap_absenController::class,'store_praktek']);
Route::post('/detail-rekap-praktek', [Rekap_absenController::class,'detail_praktek']);
Route::post('/bap_praktek', [Rekap_absenController::class,'bap_praktek']);
//Rekap Absen Teori
Route::post('/rekap-teori', [Rekap_absenController::class,'store_teori']);
Route::post('/detail-rekap-teori', [Rekap_absenController::class,'detail_teori']);
Route::post('/bap_teori', [Rekap_absenController::class,'bap_teori']);
//Rekap Absen Gabung
Route::post('/rekap-gabung', [Rekap_absenController::class,'store_gabung']);
Route::post('/detail-rekap-gabung', [Rekap_absenController::class,'detail_gabung']);
Route::post('/bap_gabung', [Rekap_absenController::class,'bap_gabung']);
//Pangajuan Jadwal Pengganti Praktek
Route::get('/jadwal-pengganti', [Jadwal_penggantiController::class,'index']);
Route::post('/pengganti-praktek', [Jadwal_penggantiController::class,'pengganti_praktek']);
Route::post('/simpan-pengganti-praktek', [Jadwal_penggantiController::class,'store_praktek']);
Route::post('/update-pengganti-praktek', [Jadwal_penggantiController::class,'update_praktek']);
Route::post('/hapus-pengganti-praktek', [Jadwal_penggantiController::class,'hapus_praktek']);
//Pangajuan Jadwal Pengganti Teori
Route::post('/pengganti-teori', [Jadwal_penggantiController::class,'pengganti_teori']);
Route::post('/simpan-pengganti-teori', [Jadwal_penggantiController::class,'store_teori']);
Route::post('/update-pengganti-teori', [Jadwal_penggantiController::class,'update_teori']);
Route::post('/hapus-pengganti-teori', [Jadwal_penggantiController::class,'hapus_teori']);
//Pangajuan Jadwal Pengganti Gabung
Route::post('/pengganti-gabung', [Jadwal_penggantiController::class,'pengganti_gabung']);
Route::post('/simpan-pengganti-gabung', [Jadwal_penggantiController::class,'store_gabung']);
Route::post('/update-pengganti-gabung', [Jadwal_penggantiController::class,'update_gabung']);
Route::post('/hapus-pengganti-gabung', [Jadwal_penggantiController::class,'hapus_gabung']);
//Administrasi Cek Kuliah Pengganti
Route::get('/cek-kuliah-pengganti', [KuliahpenggantiController::class,'index']);
Route::post('/cek-kuliah-pengganti', [KuliahpenggantiController::class,'index']);
Route::get('/pengganti-side/{id}', [KuliahpenggantiController::class,'pengganti_side']);
Route::get('/acc-pengganti/{id}', [KuliahpenggantiController::class,'acc_pengganti']);
//Administrasi Input Manual Mengajar
Route::get('/input-manual', [InputmanualController::class,'index']);
Route::post('/input-manual', [InputmanualController::class,'index']);
Route::get('/manual-side/{id}', [InputmanualController::class,'manual_side']);
Route::get('/kelas-input-manual/{id}', [InputmanualController::class,'kelas_input_manual']);
Route::post('/simpan-manual', [InputmanualController::class,'simpan_manual']);
Route::get('/rekap-manual/{id}', [InputmanualController::class,'rekap_manual']);
Route::post('/rekap-manual-teori', [InputmanualController::class,'rekap_manual_teori']);
Route::post('/rekap-manual-praktek', [InputmanualController::class,'rekap_manual_praktek']);
Route::post('/rekap-manual-gabung', [InputmanualController::class,'rekap_manual_gabung']);
// Route::get('/cari-dosen', [InputmanualController::class,'cari_dosen'])->name('cari_dosen');
//BAAK Upload Jadwal
Route::get('/upload-jadwal', [UploadjadwalController::class,'index']);
Route::post('/upload-penilai', [UploadjadwalController::class,'storeData']);
Route::post('/login-dalam', [AuthenticatedSessionController::class,'store']);


//administrasi usermhs dan dosen
Route::get('/search', [Select2SearchController::class, 'index']);
Route::get('/ajax-autocomplete-search', [Select2SearchController::class, 'selectSearch']);
Route::get('/lecturer/users', [UserdosenController::class, 'index']);
Route::get('/lecturer/edit/{user}', [UserdosenController::class, 'edit'])->name('user.edit');
Route::patch('/lecturer/update/{user}', [UserdosenController::class,'update']);

// Route::post('/login', [AuthenticatedSessionController::class, 'create'])
// ->middleware(['guest'])
// ->name('login');

Route::get('/std/users', [UsermhsController::class, 'index']);
Route::get('/std/edit/{user}', [UsermhsController::class, 'edit']);
Route::patch('/std/update/{user}', [UsermhsController::class,'update']);

//administrasi jadwal dosen
Route::get('/lecturer/schedule', [JadwaldosenController::class, 'index']);
Route::get('/rekap/day', [RekapdosenController::class, 'index']);
Route::get('/rekap/praktek-day', [RekapdosenController::class, 'praktek']);
Route::get('/rekap/teori-day', [RekapdosenController::class, 'teori']);
Route::get('/rekap/praktek-all', [RekapdosenController::class, 'praktek_all']);
Route::get('/rekap/teori-all', [RekapdosenController::class, 'teori_all']);

//rekap ajar dosen
Route::get('/lecturer/rekap', [RekapajardosenController::class, 'index']);
Route::get('/lecturer/t/rekap', [RekapajardosenController::class, 'index_t']);
Route::get('/lecturer/p/rekap', [RekapajardosenController::class, 'index_p']);



});
});

//route kusus mahasiswa
    Route::group(['middleware' => 'auth:sanctum', 'verified','authadmin'], function () {  
    Route::group(['middleware' => 'cekmhs'], function () { 
            
                    
    Route::middleware(['auth:sanctum', 'verified'])->get('/user/dashboard', function () {
    return view('mhs.dashboard');
})->name('dashboard');
//     Route::middleware(['auth:sanctum', 'verified'])->get('/user/profile', function () {
//     return view('profile.create');
// })->name('profile');

//materi dan tugas
Route::get('/sch', [JadwalmhsController::class, 'index']);
Route::get('/learning/{id}', [MaterimhsController::class,'index'])->name('mhs.materi.index');
Route::post('/download-file-materi', [MaterimhsController::class, 'download_file_materi']);
Route::get('/assignment/{id}', [TugasmhsController::class,'index'])->name('mhs.tugas.index');
Route::get('/assignment/send/{id}', [TugasmhsController::class,'send'])->name('mhs.tugas.send');
Route::post('/assignment', [TugasmhsController::class,'store']);
Route::post('/download-file-tugas', [TugasmhsController::class, 'download_file_tugas']);

//Forum Diskusi
Route::get('/form-diskusimhs/{id}', [DiskusimhsController::class,'index']);
Route::post('/tambah-diskusimhs', [DiskusimhsController::class,'store_diskusi']);
Route::get('/form-komentarmhs/{id}', [DiskusimhsController::class,'komentar']);
Route::post('/send-komentarmhs', [DiskusimhsController::class,'store_komen']);
Route::delete('/hapus-diskusimhs/{id}', [DiskusimhsController::class,'destroy_diskusi']);
Route::post('/download-file-diskusimhs', [DiskusimhsController::class, 'download_file_diskusi']);

// Route::get('/form-diskusi/{id}', [DiskusiController::class,'index']);
// Route::post('/tambah-diskusi', [DiskusiController::class,'store_diskusi']);
// Route::delete('/hapus-diskusi/{id}', [DiskusiController::class,'destroy_diskusi']);
// Route::get('/form-komentar/{id}', [DiskusiController::class,'komentar']);
// Route::post('/send-komentar', [DiskusiController::class,'store_komen']);
//Absen Mahasiswa
Route::get('/absen-mhs/{id}', [JadwalmhsController::class,'show_absen']);
Route::get('/rekap-side/{id}', [JadwalmhsController::class,'rekap_side']);
Route::post('/mhs-absen', [JadwalmhsController::class,'mhs_absen']);
Route::post('/komentar-mhs', [JadwalmhsController::class,'komentar_mhs']);


});
});

