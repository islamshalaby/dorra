@extends('admin.app')

@section('title' , 'Admin Panel AboutApp')

@section('content')

<div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>{{ __('messages.'.$data['section']) }}</h4>
             </div>
        </div>
        @if (session('status'))
            <div class="alert alert-danger mb-4" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                <strong>Error!</strong> {{ session('status') }} </button>
            </div> 
        @endif
        <form class="texteditorForm" action="" method="post" >
                @csrf
                {{-- <div class="form-group mb-4 english-direction" >
                    <label for="demo1">{{ __('messages.english') }}</label>
                    <textarea id="aboutapp_en_editor" required name="aboutapp_en" class="form-control"  rows="5">{{ $data['setting']['aboutapp_en'] }}</textarea>
                </div> --}}
                 
                    {{-- <div id="editor">
	                </div> --}}

                    <textarea required id="editor-ck" name="text" >{{ $data['setting'][$data['section'].'_ar'] }}</textarea>
                    <br>
                {{-- <div class="form-group mb-4 arabic-direction">
                    <label for="aboutapp_ar_editor">{{ __('messages.arabic') }}</label>
                    <textarea id="aboutapp_ar_editor" name="text" required  class="form-control"  rows="5">{{ $data['setting'][$data['section'].'_ar'] }}</textarea>
                </div>                 --}}
                <input type="submit" value="{{ __('messages.submit') }}" class="btn btn-primary">
        </form>

</div>

@endsection