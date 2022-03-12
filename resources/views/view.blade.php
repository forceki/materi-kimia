@extends('layouts.main')

@section('content-main')
@push('meta')
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="ADPMET berita -{{$materiId->judul}}" />
<meta property="og:image" content="{{$materiId->foto}}" />
<meta property="og:description" content="ADPMET berita terbaru - {{$materiId->judul}}">

<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{url()->current()}}">
<meta property="twitter:title" content="ADPMET - Berita - {{$materiId->judul}}">
<meta property="twitter:description" content="ADPMET berita terbaru - {{$materiId->judul}}">
<meta property="twitter:image" content={{$materiId->path_image}}>
@endpush
<div class="container">
    <h3 class="text-center" >
        {{$materiId->judul}}
     </h3>
     <span class="small-text text-muted text-capitalize" id="eventItemDate">
         tanggal di buat : {{$tanggal}}
     </span>
     <div class="row">
         <div class="col-md-12" id="newsItemContent">   
             <figure class="figure text-center">
               <img src="{{url($materiId->path_image)}}" class="img-fluid w-75" alt="">
             </figure>   
                 {!!$materiId->isi!!}
         </div>
     </div>
</div>
@endsection