@extends('layouts.simple.master')

@section('title', trans('lang.stores'))

@section('breadcrumb-title')
    <h3>{{ trans('lang.stores') }}</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">{{ trans('lang.dashboard') }}</li>
    <li class="breadcrumb-item active">{{ trans('lang.stores') }}</li>
    <li class="breadcrumb-item active">{{ trans('lang.add') }}</li>
@endsection

@section('content')

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" class="needs-validation" enctype="multipart/form-data" novalidate="" action="{{ route('stores.store') }}">
                            @csrf
                            <div class="row g-3">
                                {{-- name --}}
                                <div class="col-md-12">
                                    <label class="form-label" for="name">{{ trans('lang.name') }}</label>
                                    <input name="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror"
                                        id="name" type="text" required>
                                    @error('name')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- link --}}
                                <div class="col-md-12">
                                    <label class="form-label" for="link">{{ trans('lang.link') }}</label>
                                    <input name="link" class="form-control @error('link') is-invalid @enderror"
                                        id="link" type="text" required>
                                    @error('link')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- logo --}}
                                <div class="col-md-12">
                                    <label class="form-label" for="logo">{{ trans('lang.logo') }}</label>
                                    <input name="logo" class="form-control @error('logo') is-invalid @enderror"
                                        id="logo" type="file" required>
                                    @error('logo')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>
                            <button class="btn btn-primary my-3" type="submit">{{ trans('lang.submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('script')

@endsection
