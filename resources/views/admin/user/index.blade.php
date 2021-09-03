@extends('layouts.dosen.main')
<div class="flash-tambah" data-flashdata="{{ session('status') }}"></div>
<div class="flash-error" data-flasherror="{{ session('error') }}"></div>

@section('content')
                    <div class="table-container">
                        
                        <div class="t-header">
                            @can('users.create') 
                            <a href="/user/create" class="icon-plus"> </a> 
                             @endcan 
                            List User Staff
                           
                        </div>
                        <div class="table-responsive">
                            <table id="copy-print-csv" class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th><center>Departemen</center></th>
                                        <th>email</th>
                                        <th>Akses Level</th>
                                        <th>Action</th>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $no => $user)
                                    <tr>
                                        <td>{{ ++$no}}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td><center>{{ $user->kode }} </center></td>
                                        <td>{{ $user->email }} </td>
                                        
                                        <td>
                                            @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $role)
                                            <h5><label class="badge badge-primary">{{ $role }}</label></h5>
                                            @endforeach
                                        @endif

                                        </td>
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

    @endsection
    