@extends('admin.app')

@section('title' , 'Admin Panel User Details')

@section('content')

        <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>{{ __('messages.order_details') }}</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive"> 
                <table class="table table-bordered mb-4">
                    <tbody>
                            <tr>
                                <td class="label-table" > {{ __('messages.product_name') }} </td>
                                <td>
                                    <a style="color: blue" target="_blank" href={{"/admin-panel/products/edit/".$data['order']['product']['id']}} >{{ $data['order']['product']['title'] }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-table" > {{ __('messages.image') }} </td>
                                <td>
                                    @if($data['order']['product']['image'])
                                        <img style="max-height: 100px" src="https://res.cloudinary.com/dtmkwyhpn/image/upload/w_100,q_100/v1582799430/{{ $data['order']['product']['image'] }}"  />
                                    @else
                                        <span> No Image </span>
                                    @endif
                                </td>
                            </tr>
                                                
                            <tr>
                                <td class="label-table" > {{ __('messages.user_name') }}</td>
                                <td>{{ $data['order']['name'] }}</td>
                            </tr>
                            <tr>
                                <td class="label-table" > {{ __('messages.user_phone') }} </td>
                                <td>{{ $data['order']['phone'] }}</td>
                            </tr>
                            <tr>
                                <td class="label-table" > {{ __('messages.date_of_birth') }} </td>
                                <td>{{ $data['order']['birth_date'] }}</td>
                            </tr>
                            <tr>
                                <td class="label-table" > {{ __('messages.gender') }} </td>
                                <td>
                                    {{ $data['order']['gender'] == 1 ? __('messages.male') : __('messages.female') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="label-table" > {{ __('messages.salary') }} </td>
                                <td>{{ $data['order']['salary'].' '. __('messages.riyal') }}</td>
                            </tr>                                                        
                            <tr>
                                <td class="label-table" > {{ __('messages.family_count') }} </td>
                                <td>{{ $data['order']['family_count'].' '. __('messages.person') }}</td>
                            </tr>
                            <tr>
                                <td class="label-table" > {{ __('messages.social_status') }} </td>
                                <td>
                                    @switch($data['order']['social_status'])
                                        @case(1)
                                            {{ __('messages.single') }}
                                            @break

                                        @case(2)
                                            {{ __('messages.married') }}
                                            @break

                                        @case(3)
                                            {{ __('messages.divorced') }}
                                            @break

                                        @case(4)
                                            {{ __('messages.widow') }}
                                            @break
                                    @endswitch
                                </td>
                            </tr>
                            <tr>
                                <td class="label-table" > {{ __('messages.address') }} </td>
                                <td>{{ $data['order']['address'] }}</td>
                            </tr>                            
                            <tr>
                                <td class="label-table" > {{ __('messages.location') }} </td>
                                <td>
                                    <a style="color: blue" target="_blank" href={{"https://www.google.com/maps/@".$data['order']['latitude'].",".$data['order']['longitude'].",18z" }} >{{ __('messages.open_map') }}</a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="label-table" > {{ __('messages.date') }} </td>
                                <td>{{ $data['order']['created_at'] }}</td>
                            </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>  

@endsection



