@extends('admin.app')

@section('title' , 'Admin Panel Add New Bank')

@section('content')
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ __('messages.add_new_bank') }}</h4>
                 </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="form-group mb-4">
                <label for="title_ar">{{ __('messages.bank_name') }}</label>
                <input required type="text" name="bank_name" class="form-control" id="title_ar" placeholder="{{ __('messages.bank_name') }}" value="" >
            </div>
            <input type="submit" value="{{ __('messages.submit') }}" class="btn btn-primary">
        </form>
    </div>
@endsection