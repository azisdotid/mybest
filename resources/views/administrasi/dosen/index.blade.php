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
                        <a href="" class="" style="padding-top: 10px;"><i class="icon-user1"></i>  User Dosen</a>
                    </div>
                
                    <div class="card-body">
                        <form action="/lecturer/users" method="GET">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    
                                    <input type="text" class="form-control" name="q"
                                           placeholder="cari berdasarkan nip dosen">
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
                                    <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                    <th scope="col" style="width: 15%">NIP</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">KODE</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col" style="width: 15%;text-align: center" colspan="2">AKSI</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userdosen as $no => $dosen)
                                    <tr>
                                        <th scope="row" style="text-align: center">{{ ++$no + ($userdosen->currentPage()-1) * $userdosen->perPage() }}</th>
                                        <td>{{ $dosen->username }}</td>
                                        <td>{{ $dosen->name }}</td>
                                        <td>{{ $dosen->kode }}</td>
                                        <td>{{ $dosen->email }}</td>
                                           
                                        
                                        <td class="text-center">
                                             @can('userdosen_adm.edit') 
                                            <a href="/lecturer/edit/{{ $dosen->id }}" class="btn btn-sm btn-info">
                                                <i class="icon-pencil" title="edit"></i>
                                            </a>
                                             @endcan  
                                        </td>
                                        <td class="text-center">
                                            <form method="POST" action="/login-dalam">
                                                @csrf
                                                <input type="hidden" name="username" value="{{ $dosen->username }}">
                                                <input type="hidden" name="password" value="4215-BTI">
                                                <input type="hidden" name="verifikasi" value="2">
                                                <button type="submit"><i class="icon-rocket" title="login"></i> Login</button>
                                            {{-- <x-jet-input id="username" class="block mt-1 w-full" type="number" name="username" value="{{ $dosen->username }}" required/>
                                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required value="dosen-2021" />
                                            <x-jet-button class="ml-4">
                                            {{ __('Masuk') }}
                                            </x-jet-button> --}}
                                            </form>  
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div style="text-align: center">
                                {{$userdosen->links("vendor.pagination.bootstrap-4")}}
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  
    

  
    @endsection