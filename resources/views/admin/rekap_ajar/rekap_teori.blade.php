
@extends('layouts.dosen.main')

@section('content')

<div class="main-container">
    <div class="table-container"> 
        <div class="t-header">
            <a href="" class="" style="padding-top: 10px;"><i class="icon-documents"> </i>Rekap Ajar Teori</a>
        </div>
  <div class="card-body">
    {{-- <form action="/lecturer/t/rekap" method="GET">
        <div class="form-group">
            <div class="input-group mb-3">
          
                <input type="text" class="form-control" name="q"
                       placeholder="cari berdasarkan kelas">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                    </button>
                </div>
            </div>
        </div>
    </form> --}}
    <div class="table-responsive">
        <table id="copy-print-csv" class="table custom-table">
            <thead>
            <tr>
                
                <th scope="col" style="width: 15%">NIP</th>
                <th scope="col">AKRONIM</th>
                <th scope="col">KELAS</th>
                <th scope="col">SKS</th>
                <th scope="col">Kode MTK</th>
              
                <th scope="col">TANGGAL</th>
                <th scope="col">JAM MASUK</th>
                <th scope="col">JAM KELUAR</th>
                <th scope="col">NO RUANG</th>
                <th scope="col">PERTEMUAN</th>
                <th scope="col">Status</th>
                
          
                
            </tr>
            </thead>
            <tbody>
                @foreach ($rekapajar_t as $no => $role)
                <tr>
                    
                    <td>{{ $role->nip }}</td>
                    <td>{{ $role->kd_dosen }}</td>
                    <td>{{ $role->kd_lokal }}</td>
                    <td>{{ $role->sks }}</td>
                    <td>{{ $role->nm_mtk }} - <b>{{ $role->kd_mtk }}</b></td>
                    
                    <td>{{ $role->tgl_ajar_masuk }}</td>
                    <td><b>{{ $role->jam_masuk }}</b></td>
                    <td><b>{{ $role->jam_keluar }}</b></td>
                    <td>{{ $role->no_ruang }}</td>
                    <td>{{ $role->pertemuan }}</td>
                    <td>@if ($role->hasil_prodi=='Y')
                        <button type="button" class="btn btn-success" data-container="body" data-toggle="popover" data-placement="bottom" data-content="{{ $role->isi_prodi }} - ({{ $role->nama_log }})">
                            Sesuai
                        </button>
                        @elseif($role->hasil_prodi=='N')
                        <button type="button" class="btn btn-danger" data-container="body" data-toggle="popover" data-placement="bottom" data-content="{{ $role->isi_prodi }} - ({{ $role->nama_log }})">
                            Tidak Sesuai
                        </button>
                        @else
                        @endif
                    </td>
                  
                       
                    
                   
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="text-align: center">
            {{-- {{$rekapajar_t->links("vendor.pagination.bootstrap-4")}} --}}
        </div>
        
    </div>
</div>

@endsection

    