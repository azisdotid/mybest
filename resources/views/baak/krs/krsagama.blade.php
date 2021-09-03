@extends('layouts.dosen.main')

@section('content')
<div class="card-body">


          
                    <div class="table-container">

                        <div class="t-header">
                           <h4> Data Mahasiswa Agama Non Muslim</h4>


                           <form action="/krs/agama-kristen1" method="post" enctype="multipart/form-data">
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
                
                            <div class="form-group">
                                <label for="">File (.xls, .xlsx) <a href="{{ Storage::url('public/formatfile/penilaian agama.xlsx') }}"
                                    class="btn btn-info btn-sm">
                                    Unduh Format File<a></label>
                                <p class="text-danger">{{ $errors->first('file') }}</p>

                                <input type="file" class="btn btn-primary" name="file">
                           
                                <button class="btn btn-info btn-lg">
                                    <i class="icon-upload"></i> Upload </button>
                            </div>
                        </form>
                        <p>
                         
                        <form action="/krs/agama-kristen/singkron" method="POST">
                            @csrf
                            <button class="btn btn-info btn-lg" type="submit">
                                <i class="icon-loader"></i> Singkron Data </button>   
                       
                        </form>
                        <P></P>
                        <form action="/krs/agama-kristen/tran" method="POST">
                            @csrf
                            <button class="btn btn-secondary btn-lg" type="submit">
                                <i class="icon-delete"></i> Kosongkan Data </button>   
                       
                        </form>
                        

                        </div>
                        <div class="table-responsive">
                            <table id="tbl_list" class="table custom-table">

                                <thead>
                                    <tr>
                                     
                                   
                                      <th>NIM</th>
                                      <th>Kode MTK</th>
                                     
                                      
                                   
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
         ajax: '{{ url('krs/agama-kristen/json') }}',
         columns: [
            { data: 'nim', name: 'nim' },
            { data: 'kd_mtk', name: 'kd_mtk' },
			
         ]
     });
  });
</script>
@endpush