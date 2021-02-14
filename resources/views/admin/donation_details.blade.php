@extends('admin.app')

@section('title' , 'Admin Panel User Details')

@section('content')

        <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>{{ __('messages.donation_details') }}</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive"> 
                <table class="table table-bordered mb-4">
                    <tbody>
                            <tr>
                                <td class="label-table" > {{ __('messages.user_name') }} </td>
                                <td>
                                    {{ $data['donation']['name'] }}
                                </td>
                            </tr>                    
                            <tr>
                                <td class="label-table" > {{ __('messages.user_phone') }} </td>
                                <td>
                                    {{ $data['donation']['phone'] }}
                                </td>
                            </tr>
                            <tr>
                                <td class="label-table" > {{ __('messages.donation_description') }} </td>
                                <td>
                                    {{ $data['donation']['description'] }}
                                </td>
                            </tr>                    
                            <tr>
                                <td class="label-table" > {{ __('messages.images') }} </td>
                                <td>
                                    @foreach ($data['donation']['images'] as $image )
                                        <a target="_blank" href="https://res.cloudinary.com/dtmkwyhpn/image/upload/v1582799430/{{ $image['image'] }}" >
                                         <img src="https://res.cloudinary.com/dtmkwyhpn/image/upload/w_150,q_100/v1582799430/{{ $image['image'] }}" > &nbsp;  
                                        </a>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td class="label-table" > {{ __('messages.donation_categories') }} </td>
                                <td>
                                    @foreach ($data['donation']['categories'] as $category )
                                        <span>{{ $category['title_ar'] }} ,</span>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td class="label-table" > {{ __('messages.address') }} </td>
                                <td>{{ $data['donation']['address'] }}</td>
                            </tr>                            
                            <tr>
                                <td class="label-table" > {{ __('messages.location') }} </td>
                                <td>
                                    <a style="color: blue" target="_blank" href={{"https://www.google.com/maps/@".$data['donation']['latitude'].",".$data['donation']['longitude'].",18z" }} >{{ __('messages.open_map') }}</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="label-table" > {{ __('messages.date') }} </td>
                                <td>
                                    {{ $data['donation']['created_at'] }}
                                </td>
                            </tr>                    
                    </tbody>
                </table>
            </div>

        </div>
    </div>  

@endsection



