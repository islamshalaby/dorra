@extends('admin.app')

@section('title' , 'Admin Panel Edit Product')

@section('content')
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ __('messages.product_edit') }}</h4>
                 </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data" >
            @csrf
            @if( count($data['product_images']) > 0 )
            <div class="form-group mb-4">
                <label for="">{{ __('messages.current_images') }}</label><br>
                <div  class="row" >
                @foreach ($data['product_images'] as  $product_image)
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12" >
                        <img src="https://res.cloudinary.com/dtmkwyhpn/image/upload/w_100,q_100/v1582799430/{{ $product_image->image }}"  />    
                        <a onclick="return confirm('Are you sure you want to delete this item?');" href="/admin-panel/products/images/delete/{{ $product_image->id }}" ><i class="far fa-trash-alt"></i></a>                    
                    </div>                
                @endforeach                
                </div>
            </div>
            @endif
            <div class="custom-file-container" data-upload-id="myFirstImage">
                <label>{{ __('messages.change_image') }} ({{ __('messages.multi_images') }}) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                <label class="custom-file-container__custom-file" >
                    <input multiple type="file" name="image[]" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                </label>
                <div class="custom-file-container__image-preview"></div>
            </div>
            <div class="form-group mb-4">
                <label for="title">{{ __('messages.title') }}</label>
                <input required type="text" name="title" class="form-control" id="title" placeholder="{{ __('messages.title') }}" value="{{ $data['product']['title'] }}" >
            </div>

            <div class="form-group mb-4" style="margin-bottom : 0 !important" >
                <label for="category">{{ __('messages.category') }}</label>
                <select name="category_id" class="selectpicker mb-4" data-width="100%">
                    <option selected disabled >{{ __('messages.select') }}</option>
                    @foreach ($data['categories'] as $category)
                        <option {{ $data['product']['category_id'] == $category->id ? 'selected' : '' }} value="{{ $category->id }}" >{{ $category->title_ar }}</option>
                    @endforeach                
                </select>                
            </div>

            <div class="form-group mb-4">
                <label for="description">{{ __('messages.description') }}</label>
                <textarea required="" name="description" class="form-control" id="description" rows="5">{{ $data['product']['description'] }}</textarea>
            </div> 

            <input type="submit" value="{{ __('messages.submit') }}" class="btn btn-primary">
        </form>
    </div>
@endsection