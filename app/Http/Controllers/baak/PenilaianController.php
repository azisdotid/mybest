<?php

namespace App\Http\Controllers\baak;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penilaian_tem;
use App\Jobs\ImportJobkrs;
use App\Imports\PenilaianImport;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Datatables;

class PenilaianController extends Controller
{
    public function index()
    {
       
        return view('baak.krs.index');
    }
    public function datajson()
	{
		return Datatables::of(Penilaian_tem::all())->make(true);
	}

    public function storeData(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);
    
        if ($request->hasFile('file')) {
            //UPLOAD FILE
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs(
                'public', $filename
            );
            
            //MEMBUAT JOBS DENGAN MENGIRIMKAN PARAMETER FILENAME
            ImportJobkrs::dispatch($filename);
            return redirect()->back()->with(['success' => 'Upload success']);
        }  
        return redirect()->back()->with(['error' => 'Please choose file before']);
    }
}
