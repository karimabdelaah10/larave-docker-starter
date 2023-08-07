@extends('layouts.dashboard')
@push('title')
    {{ @$pageTitle ?? " " }}
@endpush
@push('css')
    <style>
        .form-col {
            display: inline-block !important;
            margin-right: 2px;
        }
    </style>
@endpush
@section('content')
    <section>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form
                                action="{{ route('countries.postCreate') }}"
                                method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    @include('admin.countries.form')
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success"> {{ trans('app.Save') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
