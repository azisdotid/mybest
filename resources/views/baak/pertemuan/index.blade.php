@extends('layouts.dosen.main')

@section('content')
<div class="card-body">


          
                    <div class="table-container">
                        
                        <div class="t-header">
                           <h4> Form Pertemuan Dosen</h4>
                           <form action="/pertemuan1" method="post" enctype="multipart/form-data">
                            @csrf
                
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                
                            @if (session('error'))
                                <div class="alert alert-success">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @can('temu_baak.upload') 
                            <div class="form-group">
                                <label for="">File (.xls, .xlsx) <a href="{{ Storage::url('public/formatfile/pertemuan1.xlsx') }}"
                                    class="btn btn-info btn-sm">
                                    Unduh Format File<a></label>
                                <p class="text-danger">{{ $errors->first('file') }}</p>

                                <input type="file" class="btn btn-primary" name="file">
                           
                                <button class="btn btn-info btn-lg">
                                    <i class="icon-upload"></i> Upload </button>
                            </div>
                            @endcan 
                        </form>
                        @can('temu_baak.delete') 

                        <form action="/pertemuan/tran" method="POST">
                            @csrf
                            <button class="btn btn-secondary btn-lg" type="submit">
                                <i class="icon-delete"></i> Kosongkan Pertemuan </button>  
                        </form>
                        @endcan 
                          
                        @can('temu_baak.singkron') 
                        <p></p>
                        <form action="/pertemuan/singkron" method="POST">
                            @csrf
                            <button class="btn btn-info btn-lg" type="submit">
                                <i class="icon-loader"></i> Singkron Jadwal </button>   
                       
                        </form>
                        @endcan 

                        </div>
                        <div class="table-responsive">
                            <table id="tbl_list" class="table custom-table">

                                <thead>
                                    <tr>
                                     
                                   
                                      <th>Kode Dosen</th>
                                      <th>Kode MTK</th>
                                      <th>Jam</th>
                                      <th>Hari</th>
                                      <th>Ruang</th>
                                      <th>Kelas</th>
                                      <th>SKS</th>
                                      <th>Kode Gabung</th>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                        </table>
                        </div>
                    </div>
                </div>
           
 
    @endsection
    @push('scripts')
<script type="text/javascript">
 $(document).ready(function () {
    $('#tbl_list').DataTable({
     dom: 'Blfrtip',
                 lengthMenu: [
                     [ 10, 25, 50, 10000 ],
                     [ '10', '25', '50', 'Show All' ]
                 ],
                 buttons: [
                     'copy', 'csv', 'excel', 'pdf', 'print',
                   
                 ],    
         paging: true,
         processing: true,
         serverSide: true,
         ajax: '{{ url('/pertemuan/json') }}',
         columns: [
            { data: 'kd_dosen', name: 'kode_dosen' },
			{ data: 'kd_mtk', name: 'kd_mtk' },
			{ data: 'jam_t', name: 'jam_t' },
			{ data: 'hari_t', name: 'hari_t' },
			{ data: 'no_ruang', name: 'no_ruang' },
			{ data: 'kd_lokal', name: 'kd_lokal' },
			{ data: 'sksajar', name: 'sksajar' },
			{ data: 'kd_gabung', name: 'kd_gabung' }
         ]
     });
  });
</script>
@endpush