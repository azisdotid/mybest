@extends('layouts.dosen.main')

@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="table-container"> 
                    <div class="t-header">
                        <a href="" class="" style="padding-top: 10px;"><i class="icon-user-check"></i>  Data KRS Mahasiswa</a>
                        <p><h3>catatan : Data Jadwal Yang di tampilkan di Sisi Mahasiswa Berdasarkan KRS yang 
                            <p>Tertera di Bawah ini </h3>
                    </div>
                
                    <div class="card-body">
                        <form action="/krs/mhs" method="GET">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    
                                    <input type="text" class="form-control" name="q"
                                           placeholder="cari berdasarkan nim mahasiswa">
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
                                   
                                    <th scope="col" style="width: 15%">NIM</th>
                                    <th scope="col">NO KRS</th>
                                    <th scope="col">KD MTK</th>
                                    <th scope="col">KEL PRAKTEK</th>
                                   
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($krsmhs as $no => $dosen)
                                    <tr>
                                        
                                        <td>{{ $dosen->nim }}</td>
                                        <td>{{ $dosen->no_krs }}</td>
                                        <td>{{ $dosen->kd_mtk }}</td>
                                        <td>{{ $dosen->kel_praktek }}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div style="text-align: center">
                                {{$krsmhs->links("vendor.pagination.bootstrap-4")}}
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  
    

  
    @endsection