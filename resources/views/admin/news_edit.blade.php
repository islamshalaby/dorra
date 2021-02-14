@extends('admin.app')

@section('title' , 'Admin Panel Add New Ad')

@section('content')
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ __('messages.news_edit') }}</h4>
                 </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="form-group mb-4">
                <label for="">{{ __('messages.current_image') }}</label><br>
                <img src="https://res.cloudinary.com/dtmkwyhpn/image/upload/w_100,q_100/v1582799430/{{ $data['news']['image'] }}"  />
            </div>            
            <div class="custom-file-container" data-upload-id="myFirstImage">
                <label>{{ __('messages.upload') }} ({{ __('messages.single_image') }}) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                <label class="custom-file-container__custom-file" >
                    <input type="file" name="image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div class="custom-file-container__image-preview"></div>
            </div>            
            <div class="form-group mb-4">
                <label for="title">{{ __('messages.title') }}</label>
                <input maxlength="25" required type="text" name="title" class="form-control title_news" id="title" placeholder="{{ __('messages.title') }}" value="{{ $data['news']['title'] }}" >
            </div>
            <div class="form-group mb-4">
                <label for="small_description">{{ __('messages.small_description') }}</label>
                <input maxlength="50" required type="text" name="small_description" class="form-control small_description_news" id="small_description" placeholder="{{ __('messages.small_description') }}" value="{{ $data['news']['small_description'] }}" >
            </div>
            <div class="form-group mb-4 arabic-direction">
                <label for="news_editor">{{ __('messages.description') }}</label>
                <textarea id="editor-ck" name="description" class="form-control"  rows="5">{{ $data['news']['description'] }}</textarea>
            </div> 
            <div class="form-group mb-4">
                <label>{{ __('messages.link') }}</label>
                <p>{{"http://".$_SERVER['HTTP_HOST']."/webview/news/".$data['news']['id']}}</p>
            </div>
            <input type="submit" value="{{ __('messages.submit') }}" class="btn btn-primary">
        </form>
    </div>
@endsection