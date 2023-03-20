@extends('layouts.simple.master')

@section('title', trans('lang.categories'))

@section('breadcrumb-title')
    <h3>{{ trans('lang.categories') }}</h3>
@endsection

@section('breadcrumb-items')
    {{-- <li class="breadcrumb-item"><a href="{{route('home')}}">{{ trans('lang.dashboard') }}</a></li> --}}
    <li class="breadcrumb-item active">{{ trans('lang.categories') }}</li>
@endsection

@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Zero Configuration  Starts-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5><a role="button" class="btn btn-success " href={{ route('categories.create')}}><i class="fa fa-plus-circle"></i>{{trans('lang.add_category')}}</a></h5>
                    </div>
                    <div class="card-body">
                        <div class="table">
                            {!! $dataTable->table() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Zero Configuration  Ends-->
        </div>
    </div>
    <!-- Container-fluid Ends-->

@endsection

@section('script')
{!! $dataTable->scripts() !!}
@endsection