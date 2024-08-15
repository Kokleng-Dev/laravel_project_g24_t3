@extends('backends.layouts.master')
@section('title')
    Home Page
@endsection
@section('content')
    <h2>Hello</h2>

    <form action="{{ route('admin.home.test') }}" method="POST">
        @csrf
        <input type="text" name="username">
        <input type="password" name="password">
        <button>Submit</button>
    </form>
@endsection
