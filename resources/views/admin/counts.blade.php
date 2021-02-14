@extends('admin.app')

@section('title' , 'Admin Panel Counts')

@section('content')
<div class="col-lg-12 col-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>{{ __('messages.counts') }}</h4>
             </div>
    </div>
    <form method="post" action="" enctype="multipart/form-data" >
        @csrf
         <div class="form-group mb-4">
            <label for="beneficiaries_count">{{ __('messages.beneficiaries_count') }}</label>
            <input required type="number" name="beneficiaries_count" class="form-control" id="beneficiaries_count" placeholder="{{ __('messages.beneficiaries_count') }}" value="{{$data['count']['user']}}" >
        </div>       
         <div class="form-group mb-4">
            <label for="services_count">{{ __('messages.services_count') }}</label>
            <input required type="number" name="services_count" class="form-control" id="services_count" placeholder="{{ __('messages.services_count') }}" value="{{$data['count']['service']}}" >
        </div>       
         <div class="form-group mb-4">
            <label for="family">{{ __('messages.family') }}</label>
            <input required type="number" name="family" class="form-control" id="family" placeholder="{{ __('messages.family') }}" value="{{$data['count']['family']}}" >
        </div>       
         <div class="form-group mb-4">
            <label for="initiative">{{ __('messages.initiative') }}</label>
            <input required type="number" name="initiative" class="form-control" id="initiative" placeholder="{{ __('messages.initiative') }}" value="{{$data['count']['initiative']}}" >
        </div>       
        <input type="submit" value="{{ __('messages.submit') }}" class="btn btn-primary">
    </form>
</div>
@endsection