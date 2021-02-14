@extends('admin.app')

@section('title' , 'Admin Panel Add New Product')

@section('content')
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ __('messages.add_new_product') }}</h4>
                 </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data" >
            @csrf

            <div class="custom-file-container" data-upload-id="myFirstImage">
                <label>{{ __('messages.upload') }} ({{ __('messages.multi_images') }}) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                <label class="custom-file-container__custom-file" >
                    <input type="file" multiple required name="image[]" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div class="custom-file-container__image-preview"></div>
            </div>            
            <div class="form-group mb-4">
                <label for="title">{{ __('messages.title') }}</label>
                <input required type="text" name="title" class="form-control" id="title" placeholder="{{ __('messages.title') }}" value="" >
            </div>
            <div class="form-group mb-4">
                <label for="category">{{ __('messages.category') }}</label>
                <select required name="category_id" class="selectpicker mb-4" data-width="100%">
                        <option selected disabled >{{ __('messages.select') }}</option>
                    @foreach ($data['categories'] as $category)
                        <option value="{{$category->id}}" > {{$category->title_ar}} </option>    
                    @endforeach
                </select>                
            </div>            
            <div class="form-group mb-4">
                <label for="description">{{ __('messages.description') }}</label>
                <textarea required="" name="description" class="form-control" id="description" rows="5"></textarea>
            </div>            
            
            <input type="submit" value="{{ __('messages.submit') }}" class="btn btn-primary">
        </form>
    </div>
@endsection