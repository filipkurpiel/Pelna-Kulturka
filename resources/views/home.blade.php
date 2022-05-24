@extends('layouts.app')
@section('content')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Panel Sterowania') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    @endif
                    <form action="{{url('ZapiszArtykul')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('failed'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('failed') }}
                        </div>
                    @endif
                        <div class="image">
                            <label>Zdjęcie w nagłówku</label>
                            <input type="file" class="form-control" requested name="image">
                        </div><br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="autor" id="autor" placeholder="Jaszczur">
                        </div><br>
                        <div class="form-group">
                            <textarea class="form-control" name="tytul" id="tytul" rows="1" placeholder="Tytuł"></textarea>
                        </div><br>
                        <div class="form-group">
                            <textarea name="zawartosc" class="form-control" id="zawartosc" placeholder="Artykuł"></textarea>
                        </div>
                        <div class="card-footer"> 
                            <button type="submit" class="btn btn-success"> Save </button>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                    ClassicEditor
                    {
                    config.language = 'en';
                    config.enterMode                = CKEDITOR.ENTER_DIV;
                    config.shiftEnterMode            = CKEDITOR.ENTER_BR;
                    };
            </script>
        </div>
    </div>
</div>
@endsection
