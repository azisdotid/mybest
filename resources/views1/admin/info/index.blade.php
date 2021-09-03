@extends('layouts.dosen.main')
<div class="flash-tambah" data-flashdata="{{ session('status') }}"></div>
<div class="flash-error" data-flasherror="{{ session('error') }}"></div>

@section('content')
                    <div class="table-container">
                        
                        <div class="t-header">
                            @can('users.create') 
                            <a href="/create/information" class="icon-plus"> </a> 
                             @endcan 
                           Data Pengumuman
                           
                        </div>
                        <div class="table-responsive">
                            <table id="myTable2" class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th> 
                                        <th><center>Tanggal Upload</center></th>
                                        <th>Action</th>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($info as $no => $user)
                                    <tr>
                                        <td>{{ ++$no}}</td>
                                        <td><h4><a href=""> {{ $user->title }} </a></h4>
                                        </td>
                                       
                                        <td><center>{{ $user->created_at }} </center></td>

                                        <td>
                                             @can('users.edit') 
                                            <a href="/user/edit/{{ $user->id }}" class="btn btn-sm btn-info">
                                                <i class="icon-pencil" title="edit"></i>
                                            </a>
                                          

                                             {{-- {{ route('admin.user.edit', $user->id) }}   --}}
                                         @endcan 
                                        
                                        @can('users.delete')
                                        <form name="form1" id="form1" action="/hapus-user/{{$user->id}}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-secondary"><i class="icon-trash" title="Hapus"></i></button>
                                          </form>
                                        @endcan

                                        
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
             </div>
             @push('scripts')
             <script type="text/javascript">
             $('.tombol-hapus').on('click',function(e){
           e.preventDefault();
           const href=$(this).attr('href');
           Swal.fire({
             title: 'Apakah anda yakin',
             text: "Data akan dihapus",
             type: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Hapus Data!'
           }).then((result) => {
             if (result.value) {
               document.location.href=href;
               
             }
           })
           });
           $(document).ready(function () {
                $('#myTable2').DataTable({
                 dom: 'Blfrtip',
                             lengthMenu: [
                                 [ 10, 25, 50, 10000 ],
                                 [ '10', '25', '50', 'Show All' ]
                             ],
                             buttons: [
                                 'copy', 'csv', 'excel', 'pdf', 'print'
                             ],
               responsive: true
                 });
           
              });
               </script>
           @endpush
           
    @endsection
    