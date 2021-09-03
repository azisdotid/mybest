<?php

namespace App\Http\Controllers\baak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pertemuan;
use Illuminate\Support\Facades\DB;
use App\Jobs\ImportJobtemu;
use App\Imports\PertemuanImport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Datatables;


class PertemuanController extends Controller
{
    public function __construct()
    {
       $this->middleware(['permission:temu_baak.index |temu_baak.upload|temu_baak.singkron|temu_baak.delete']);
       if(!$this->middleware('auth:sanctum')){
        return redirect('/login');
        }
    }
    public function index()
    {
       
        return view('baak.pertemuan.index');
    }
    public function datajson()
	{
		return Datatables::of(Pertemuan::get())->make(true);
	}

    public function storeData(Request $request)
    {
        //VALIDASI
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new PertemuanImport, $file); //IMPORT FILE 
            return redirect()->back()->with(['success' => 'Upload success']);
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
    public function tpertemuan()
    {
        $temu = DB::select('call t_pertemuan');
        return redirect()->back()->with(['success' => 'success terhapus']);
    }
    public function singkrontemu()
    {
        $temu = DB::select('call insert_jadwal');
        $temu1 = DB::select('call jadwal_agama');
        return redirect()->back()->with(['success' => 'success di singkron']);
    }
}
