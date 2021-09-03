
@extends('layouts.dosen.main')

@section('content')
<div class="main-container">
  <div class="flash-tambah" data-flashdata="{{ session('status') }}"></div>
  <div class="flash-error" data-flasherror="{{ session('error') }}"></div>
  <!-- Row start -->
  <div class="row gutte">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  

      <div class="table-container " >
       <div class="" > 
        <h4> 
		 
          <a href="{{url('tugas-create/'.$id) }}"><button class="btn btn-primary btn-lg"  ><i class="icon-add"> </i> Tambah Tugas</button></a>
          
      </h4>
      <hr>
</div>
      
        <div class="table-responsive">
          <table id="copy-print-csv" class="table custom-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Mtk</th>
                <th>Kelas</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Pertemuan</th>       
                <th>Mulai</th>
                <th>Selsai</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

            @foreach ($tugas as $no => $tugas)
                
              <tr>
                <td>{{++$no}}</td>
                <td>{{$tugas->kd_mtk}}</td>
                <td>{{$tugas->kd_lokal}}</td>
                <td><p class="readmore1">{{$tugas->judul}}</p></td>
                <td><p style="text-align: justify;" class="readmore">{{$tugas->deskripsi}}</p></td>
                <td><center class="btn btn-info"> {{$tugas->pertemuan}}</class=></td>
                <td>{{$tugas->mulai}}</td>
                <td>{{$tugas->selsai}}</td>
                <td>
                
                 

                  <div class="btn-group">
										<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Pilih
										</button>
										<div class="dropdown-menu">
                     
                      @if (isset($tugas->file))
                      <form action="/download-file-tugas-dosen" method="post">
                          @csrf
                          <input type="hidden" name="id" value="{{$id}}">
                          <input type="hidden" name="file" value="{{$tugas->file}}">
                          <center><button type="submit" class="btn btn-info btn-rounded btn-sm"> Unduh</button>
                      </form>  
                      @endif
                      <p>
                      </p>
                      @php
                          
                      $show=Crypt::encryptString($tugas->id.','.$tugas->kd_lokal.','.$tugas->kd_mtk.','.$tugas->pertemuan);                                    
                      @endphp
                        <a href="/tugas-show/{{ $show }}" class=" btn btn-sm btn-dark"> Show</a>
															<div class="dropdown-divider"></div>
															<div class="dropdown-divider"></div>
															<div class="dropdown-divider"></div>
															<div class="dropdown-divider"></div>
														
                                 
                      <form action="/hapus-tugas/{{$tugas->id}}" method="post" >
                        @method('delete')
                        @csrf
                        <center> <button type="submit" class="btn btn-sm btn-danger" id="btnDelete">Hapus</button> 
                      </form>


										</div>
									</div>
                </td>
              </tr>

              @endforeach
          
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
  <!-- Row end -->


</div>

@endsection
@push('scripts')

		<script type="text/javascript">
		$('#btnDelete').on('click',function(e){
			document.onsubmit=function(){
           return confirm('Yakin Ingin Dihapus?');
       }
	});
  $(".readmore").expander({
        slicePoint : 50,
        expandText: 'More',
        userCollapseText : 'Less'
  });
  $(".readmore1").expander({
        slicePoint : 20,
        expandText: 'More',
        userCollapseText : 'Less'
  });
			</script>
	@endpush