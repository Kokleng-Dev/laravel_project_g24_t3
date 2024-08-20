@extends('backends.layouts.master')
@section('title')
    {{ __('Company') }}
@endsection
@section('content')
    <div class="container">
        @if(checkPermission('company','edit'))
            <a href="{{ route('admin.company.edit') }}" class="btn btn-success"><i class="fa fa-pen"></i> {{__('Edit')}}</a>
        @endif
        <div class="row my-4">
            <div class="col-lg-3 col-12">
                <div class="w-100 text-center">
                    <img src="{{ asset($company->photo ? $company->photo : '/images/photo/no_pic.png') }}" class="rounded-circle border border-primary" width="100" height="100" alt="">
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <table class="table table-sm table-hover">
                    <tbody>
                        <tr>
                            <td>{{__('Name')}}</td>
                            <td>{{ $company->name }}</td>
                        </tr>
                        <tr>
                            <td>{{__('Email')}}</td>
                            <td>{{ $company->email }}</td>
                        </tr>
                        <tr>
                            <td>{{__('Phone')}}</td>
                            <td>{{ $company->phone }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
