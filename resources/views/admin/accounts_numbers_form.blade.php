@extends('admin.app')

@section('title' , 'Admin Panel Add New Product')

@section('content')
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ __('messages.add_new_account_number') }}</h4>
                 </div>
        </div>
        <form action="" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="form-group mb-4">
                <label for="account_name">{{ __('messages.account_name') }}</label>
                <input required type="text" name="account_name" class="form-control" id="account_name" placeholder="{{ __('messages.account_name') }}" value="" >
            </div>
            <div class="form-group mb-4">
                <label for="account_type">{{ __('messages.account_type') }}</label>
                <input  type="text" name="account_type" class="form-control" id="account_type" placeholder="{{ __('messages.account_type') }}" value="" >
            </div>
            <div class="form-group mb-4">
                <label for="account_number">{{ __('messages.account_number') }}</label>
                <input required  type="text" name="account_number" class="form-control" id="account_number" placeholder="{{ __('messages.account_number') }}" value="" >
            </div>
            <div class="form-group mb-4">
                <label for="iban">{{ __('messages.iban') }}</label>
                <input   type="text" name="iban" class="form-control" id="iban" placeholder="{{ __('messages.iban') }}" value="" >
            </div>
            
            <div class="form-group mb-4">
                <label for="bank">{{ __('messages.select_bank') }}</label>
                <select required name="bank_id" class="selectpicker mb-4" data-width="100%">
                        <option selected disabled >{{ __('messages.select') }}</option>
                    @foreach ($data['banks'] as $bank)
                        <option value="{{$bank->id}}" > {{$bank->bank_name}} </option>    
                    @endforeach
                </select>                
            </div>           
            
            <input type="submit" value="{{ __('messages.submit') }}" class="btn btn-primary">
        </form>
    </div>
@endsection