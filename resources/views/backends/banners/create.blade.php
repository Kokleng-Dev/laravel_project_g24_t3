@extends('backends.layouts.master')
@section('title')
    {{ __('Create Banner') }}
@endsection
@section('content')
   <div class="card">
    <div class="card-header text-primary">
        <h2><i class="fa fa-user-check"></i> {{__("Create Banner")}}</h2>
    </div>
    <div class="card-body">
        <a href="{{route('admin.banner')}}" class="btn btn-sm btn-danger"><i class="fa fa-reply"></i> {{__('Back')}}</a>
        <form action="{{ route('admin.bulk.store') }}" class="my-2" method="POST"   enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="tbl" value="banners">
            <input type="hidden" name="per" value="banner">

            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label for="name">{{__('Name')}}</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="note">{{__('Note')}}</label>
                        <input type="text" class="form-control" name="note">
                    </div>
                    <div class="mb-3">
                        <label for="photo">{{__('Photo')}}</label>
                        <input type="file" accept="image/*" class="form-control" name="photo" id="photo">
                    </div>
                </div>
                <div class="col-12">
                    <div class="text-right">
                        <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-save"></i> {{__('Submit')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
   </div>

@endsection
