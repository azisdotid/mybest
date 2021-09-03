
@extends('layouts.dosen.main')

@section('content')

<div class="main-container">
    <div class="table-container"> 
        <div class="t-header">
            <a href="" class="" style="padding-top: 10px;"><i class="icon-file"></i>  Jadwal Mengajar Dosen</a>
        </div>
  <div class="card-body">
    <form action="/lecturer/schedule" method="GET">
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
                <th scope="col">HARI</th>
                <th scope="col">JAM</th>
                <th scope="col">RUANG</th>
              
                <th scope="col"  colspan="2">NAMA MTK</th>
               
                <th scope="col">SKS</th>
                <th scope="col">KD GABUNG</th>
                <th scope="col">KEL PRAKTEK</th>
                
            </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $no => $role)
                <tr>
                    
                    <td>{{ $role->nip }}</td>
                    <td>{{ $role->kd_dosen }}</td>
                    <td>{{ $role->kd_lokal }}</td>
                    <td>{{ $role->hari_t }}</td>
                    <td>{{ $role->jam_t }}</td>
                    <td>{{ $role->no_ruang }}</td>
                    <td>{{ $role->nm_mtk }} </td>
                    <td><b>{{ $role->kd_mtk }}</b> </td>
                    <td>{{ $role->sksajar }} </td>
                    <td>{{ $role->kd_gabung }} </td>
                    <td>{{ $role->kel_praktek }} </td>
                       
                    
                   
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="text-align: center">
            {{$jadwal->links("vendor.pagination.bootstrap-4")}}
        </div>
        
    </div>
</div>

@endsection

    