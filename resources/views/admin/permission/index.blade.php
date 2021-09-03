@extends('layouts.dosen.main')

@section('content')

        <div class="card-body">
                    <div class="table-container">
                        <div class="t-header">
                            @can('permissions.index') 
                            <a href="{{ url('/permission/create') }}" class="ti-pencil" title="add new"> 
                            <i class="icon-plus"></i> </a>
                            @endcan 
                            List Permissions

                        </div>
                        <div class="table-responsive">
                            <table id="copy-print-csv" class="table custom-table">
                                <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Position</th>
                                      <th>Guard</th>
                                      
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $no => $permission)
                                    <tr>
                                      <td>{{ ++$no}}</td>
                                      <td>{{ $permission->name }}</td>
                                      <td>{{ $permission->guard_name }}</td>
                                      
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                        </div>
                    </div>
                </div>
    @endsection
   