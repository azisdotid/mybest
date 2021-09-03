
@extends('layouts.dosen.main')

@section('content')

<div class="main-container">
    <div class="table-container"> 
        <div class="t-header">
            <a href="" class="" style="padding-top: 10px;"><i class="icon-documents"> </i>Rekap Ajar Teori ALL </a>
        </div>
  <div class="card-body">
    <form action="/rekap/teori-all" method="GET">
        <div class="form-group">
            <div class="input-group mb-3">
          
                <input type="text" class="form-control" name="q"
                       placeholder="cari berdasarkan kode dosen">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                    </button>
                </div>
            </div>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table custom-table">
            <thead>
            <tr>
                
                <th scope="col" style="width: 15%">NIP</th>
                <th scope="col">AKRONIM</th>
                <th scope="col">KELAS</th>
                <th scope="col">SKS</th>
                <th scope="col">Kode MTK</th>
              
                <th scope="col">TANGGAL</th>
                <th scope="col">HARI</th>
                <th scope="col">JAM MASUK</th>
                <th scope="col">JAM KELUAR</th>
                <th scope="col">NO RUANG</th>
                <th scope="col">PERTEMUAN</th>
          
                
            </tr>
            </thead>
            <tbody>
                @foreach ($rekapajarall as $no => $role)
                <tr>
                    
                    <td>{{ $role->nip }}</td>
                    <td>{{ $role->kd_dosen }}</td>
                    <td>{{ $role->kd_lokal }}</td>
                    <td>{{ $role->sks }}</td>
                    <td>{{ $role->nm_mtk }} - <b>{{ $role->kd_mtk }}</b></td>
                    
                    <td>{{ $role->tgl_ajar_masuk }}</td>
                    <td>{{ $role->hari_ajar_masuk }}</td>
                    <td><h5>{{ $role->jam_masuk }}</h5></td>
                    <td><h5>{{ $role->jam_keluar }}</h5></td>
                    <td>{{ $role->no_ruang }}</td>
                    <td>{{ $role->pertemuan }}</td>
                  
                       
                    
                   
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="text-align: center">
            {{$rekapajarall->links("vendor.pagination.bootstrap-4")}}
        </div>
        
    </div>
</div>

@endsection

    