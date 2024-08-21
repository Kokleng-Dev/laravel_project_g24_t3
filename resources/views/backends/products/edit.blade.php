@extends('backends.layouts.master')
@section('title')
    {{ __('Edit Product') }}
@endsection
@section('content')
   <div class="card">
    <div class="card-header text-primary">
        <h2><i class="fa fa-user"></i> {{__("Edit Product")}}</h2>
    </div>
    <div class="card-body">
        <a href="{{route('admin.product')}}" class="btn btn-sm btn-danger"><i class="fa fa-reply"></i> {{__('Back')}}</a>
        <form action="{{ route('admin.product.update', $product->id) }}" class="my-2" method="POST">
            @csrf


            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label for="category">{{__('Category')}} <span class="text-danger">*</span></label>
                        <select name="product_category_id" id="category" class="form-control" required>
                            <option value="">{{__('Please Select')}}</option>
                            @foreach ($product_categories as $cat)
                                <option value="{{ $cat->id }}" {{ $cat->id == $product->product_category_id ? 'selected' : '' }}>{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name">{{__('Name')}} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{ $product->name }}" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="price">{{__('Price')}} <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="price" value="{{ $product->price }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="note">{{__('Note')}}</label>
                        <input type="text" class="form-control" value="{{ $product->note }}" name="note">
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
