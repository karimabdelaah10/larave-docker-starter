@extends('layouts.dashboard')
@push('title')
    {{ @$pageTitle ?? " " }}
@endpush
@push('css')
    <style>
        .form-check {
            display: inline-block !important;
            margin: 0 30px 0 0 !important;
        }

        fieldset {
            border: 1px solid #e2e2e2;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
@endpush
@section('content')
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $pageTitle }}</h4>
                    </div>
                    <div class="card-body">
                        <form
                            class="form"
                            action="{{ route('countries.postCreate') }}"
                            method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @include('admin.countries.form' , ['row' => $country])
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
    </section>
@endsection
@push('js')
    <script src="/dashboard_assets/js/select2.full.min.js"></script>
    <script src="/dashboard_assets/js/form-select2.min.js"></script>
@endpush
