@extends('layouts.main')

@section('content-main')
<div class="container">
    <div class="col-md-10 list">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-5 news-list">
          @forelse ($materi as $setmateri)
          <a class="btn" href="{{url('materi/'.$setmateri->id.'/'.Str::slug($setmateri->judul))}}">
            <div class="col-md-4 news-container">
              <div class="card hvr-grow-shadow" style="width: 18rem; margin:10px" class="row">
                <img src="{{url($setmateri->path_image)}}" class="card-img-top" alt="materi">
                <div class="card-body">
                  <p class="card-text">{{$setmateri->judul}}</p>
                </div>
              </div>
            </div>
          </a>
          @empty
          <div class="col-md-12">
              <i><h5><i class="fas fa-search mx-3"></i>Materi tidak dapat ditemukan</h5></i>
          </div>
          @endforelse
      </div>
  </div>
</div>
  
@endsection