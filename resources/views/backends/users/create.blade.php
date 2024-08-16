@extends('backends.layouts.master')
@section('title')
    {{ __('Create User') }}
@endsection
@section('content')
   <div class="card">
    <div class="card-header text-primary">
        <h2><i class="fa fa-user-check"></i> {{__("Create User")}}</h2>
    </div>
    <div class="card-body">
        <a href="{{route('admin.user')}}" class="btn btn-sm btn-danger"><i class="fa fa-reply"></i> {{__('Back')}}</a>
        <form action="{{ route('admin.user.store') }}" class="my-2" method="POST">
            @csrf

            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label for="name">{{__('Name')}} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">{{__('Email')}}</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label for="role">{{__('Role')}} <span class="text-danger">*</span></label>
                        <select name="role_id" id="role" class="form-control" required>
                            <option value="">{{__('Please Select')}}</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="username">{{__('Username')}} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">{{__('Password')}} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="password" required>
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
