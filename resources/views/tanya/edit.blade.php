@extends('adminlte.master')

@section('title')
Edit pertanyaan
@endsection

@push('script-head')
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@endpush

@section('content')
<div class="ml-3">
  <form action="/pertanyaan/{{$tanya->id}}" method="POST" style="margin-left: 15px; margin-right: 15px">
    @csrf
    @method('PUT')
    <div class="form-group has-feedback{{ $errors->has('judul') ? 'has-error' : '' }}" style="padding-top : 20px">
      <center><h4>Edit Pertanyaan</h4></center>
      <label for="judul">Judul</label>
      <input type="text" class="form-control" name="judul" value="{{$tanya->judul}}" id="judul">
      @if( $errors->has('judul'))
        <span class="help-block">
          <p>{{ $errors->first('judul') }}</p>
        </span>
      @endif
    </div>
    <div class="form-group has-feedback{{ $errors->has('isi') ? 'has-error' : '' }}">
      <label for="isi">Isi</label>
      <textarea name="isi" class="form-control my-editor">{{ $tanya->isi }}</textarea>
      @if( $errors->has('isi'))
        <span class="help-block">
          <p>{{ $errors->first('isi') }}</p>
        </span>
      @endif
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a class="text-decoration-none ml-2 mt-2" href="/pertanyaan">Kembali ke daftar Pertanyaan</a>
  </form>
</div>
@endsection

@push('scripts')
  <script>
    var editor_config = {
      path_absolute : "/",
      selector: "textarea.my-editor",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };

    tinymce.init(editor_config);
  </script>
@endpush