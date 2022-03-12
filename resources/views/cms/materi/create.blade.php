@extends('cms.layouts.main')

@section('content')
<div class="d-flex justify-content-between align-items-center">
  </div>
  <div class="container">
    <form action="/admin/materi/create/store" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row g-3 m-3">
              <div class="col-md-12">
                  <label class="form-label">Judul Materi</label>
                  <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul">
                  @error('judul')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>    
                   @enderror
              </div>
              <div class="col-md-6">
                  <label class="form-label">Foto</label>
                  <input name="foto" type="file" id="profile_image" onchange="loadPreview(this);" class="form-control @error('foto') is-invalid @enderror"  placeholder="Choose file" >
                  @error('foto')
                  <div class="invalid-feedback">
                      {{$message}}
                  </div>
                  @enderror
                  <label for="gambar"></label>
                  <div style="text-align:center">
                      <img id="preview_img" alt="preview image" style="max-height: 150px;">
                  </div>  
              </div>
              <div class="col-md-6">
                  <div >
                      <label class="form-label  @error('author') text-warning @enderror">Guru</label>
                      <input name="guru" type="text" class="form-control @error('author') is-invalid @enderror">
                      @error('author')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                      @enderror
                  </div>
              </div>
              <div class="col-md-12">
                  <textarea name="isi" id="editor" class="form-control"></textarea>
              </div>
              <div class="col-md-5">
                  <label class="form-label">Tanggal Materi</label>
                  <input name="tanggal" type="datetime-local" class="form-control ">
              </div>
              <button type="submit" class="btn btn-block btn-dark"><i class="fa fa-fw fa-upload"></i> Upload</button>
        </div>
    </form>
  </div>
@endsection

@section('script')
<script>
    function loadPreview(input, id) {
      id = id || '#preview_img';
      if (input.files && input.files[0]) {
          var reader = new FileReader();
   
          reader.onload = function (e) {
              $(id)
                .attr('src', e.target.result)
                .height(150);
          };
   
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<!-- CKeditor JS -->

<script src="{{url('js/ckeditor/ckeditor.js')}}"></script>
    <script>
        class MyUploadAdapter {
            constructor( loader ) {
                this.loader = loader;
            }
        
            upload() {
                return this.loader.file
                    .then( file => new Promise( ( resolve, reject ) => {
                        this._initRequest();
                        this._initListeners( resolve, reject, file );
                        this._sendRequest( file );
                    } ) );
            }
        
            abort() {
                if ( this.xhr ) {
                    this.xhr.abort();
                }
            }
        
            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();
        
                xhr.open( 'POST', "{{route('upload', ['_token' => csrf_token() ])}}", true );
                xhr.responseType = 'json';
            }
        
            _initListeners( resolve, reject, file ) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${ file.name }.`;
        
                xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                xhr.addEventListener( 'abort', () => reject() );
                var file = `${file.name}`
                
                xhr.addEventListener( 'load', () => {
                    const response = xhr.response;
                    
                    if ( !response || response.error ) {
                        return reject( response && response.error ? response.error.message : genericErrorText );
                    }
                    
        
                    resolve( response );
                } );
        
                    if ( xhr.upload ) {
                        xhr.upload.addEventListener( 'progress', evt => {
                            if ( evt.lengthComputable ) {
                                loader.uploadTotal = evt.total;
                                loader.uploaded = evt.loaded;
                            }
                        } );
                    }
            }
        
            _sendRequest( file ) {
                const data = new FormData();
        
                data.append( 'upload', file );
        
                this.xhr.send( data );
            }
        }
        function MyCustomUploadAdapterPlugin( editor ) {
        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            return new MyUploadAdapter( loader );
        };
        }
 
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                extraPlugins: [ MyCustomUploadAdapterPlugin ],
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>


<!-- end CKeditor JS -->
    
@endsection