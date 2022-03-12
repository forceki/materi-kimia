@extends('cms.layouts.main')

@section('content')
    <div class="container">
    {{-- @if(session('success')) 
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{session('success')}}</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif  --}}
    <h4 class="m-3">Materi</h4>
    <div class="row justify-content-between d-flex mx-1">
      <div class="col-md-8 mt-1 ">
        <form action="" class="d-flex input-group">
          <input name="term" type="text" class="form-control" placeholder="Cari Judul Materi">
          <button class="btn btn-custom btn-primary input-group-text"><i class="fas fa-search"></i> Cari</button>
        </form>
      </div>
      <div class="col-md-2 mt-1 text-center">
        <a class="btn btn-success " href="/admin/materi/create" style="height:40px;"><i class="fas fa-plus-circle mx-1"></i>tambah</a>
      </div>
    </div> 
      <div class="">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Gambar</th>
                <th scope="col">Judul</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>    
                {{-- <tr class="text-center">
                  <td colspan="6">
                   <i><h5><i class="fas fa-search mx-3"></i>Materi tidak dapat ditemukan</h5></i>
                  </td>
                </tr> --}}


              @foreach ($materi as $setmateri)
              <tr>
                <td class="w-15" style="width:30%">
                    <img src="{{url($setmateri->path_image)}}" class="img-fluid img-thumbnail" alt="materi">
                </td>
                <td class="text-capitalize">{{$setmateri->judul}}</td>
                <td class="text-capitalize">{{$setmateri->tanggal->isoFormat('MMMM D, Y')}}</td>
                <td>
                    <a href="{{ url('admin/materi/delete/'.$setmateri->id) }}"><i style="margin-left: 2px; color:red;" class="far fa-trash-alt" style="color: red;"></i></a>
                    {{-- <a href="{{ url('admin/materi/edit/'.$setmateri->id) }}"><i style="margin-left: 2px;" class="far fa-edit"></i></a> --}}
                </td>
              </tr>
              {{-- <tr class="text-center">
                <td colspan="6">
                 <i><h5><i class="fas fa-search mx-3"></i>Berita tidak dapat ditemukan</h5></i>
                </td>
              </tr> --}}
              @endforeach
            </tbody>
          </table>
          {{-- {{ $berita->withQueryString()->onEachSide(1)->links() }} --}}
      </div>
    </div>
@endsection