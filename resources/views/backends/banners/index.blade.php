@extends('backends.layouts.master')
@section('title')
    {{__('Banner')}}
@endsection
@section('content')
   <div class="card">
    <div class="card-header text-primary">
        <h2><i class="fa fa-users"></i> {{__('Banner')}}</h2>
    </div>
    <div class="card-header">
        @if(checkPermission('product','create'))
            <a href="{{route('admin.banner.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> {{__('Create')}}</a>
        @endif
        <div class="row">
            <div class="col"></div>
            <div class="col-3">
                <form action="{{ route('admin.banner') }}" method="GET">
                    <div class="input-group">
                        <input type="search" value="{{ $search }}" class="form-control" name="search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-search"></i> {{__('Search')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive my-2">
            <table class="table table-sm table-hover table-bordered text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{__('Photo')}}</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Note')}}</th>
                        <th>{{__('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $index => $banner)
                        <tr>
                            <td  style="vertical-align: middle;">{{ $index + 1 }}</td>
                            <td  style="vertical-align: middle;">
                                <img src="{{ asset($banner->photo) }}" class="rounded" width="50" alt="">
                            </td>
                            <td  style="vertical-align: middle;">{{ $banner->name }}</td>
                            <td  style="vertical-align: middle;">{{ $banner->note }}</td>
                            <td  style="vertical-align: middle;">
                             @if(checkPermission('banner','edit'))
                                <a href="{{ route('admin.banner.edit', $banner->id) }}" class="btn btn-sm btn-success"><i class="fa fa-pen"></i> {{__('Edit')}}</a>
                            @endif

                                @if(checkPermission('banner','delete'))
                                    @php
                                        $btnDelete = '<a href="' . route('admin.bulk.delete', $banner->id) . '?per=banner&tbl=banners' . '" class="btn btn-sm btn-danger"> ' . __('Yes') . '</a>';
                                        $btnDelete .= '<span class="btn btn-sm btn-dark ml-1 popNo">'. __('No') .'</span>';
                                    @endphp

                                    <button type="button" class="btn btn-sm btn-danger pop" data-toggle="popover" data-trigger="focus" title="{{__('Are you sure ?')}}" data-html="true" data-content="<div class='text-center'>{{ $btnDelete }}</div>"><i class="fa fa-trash"></i> {{__('Delete')}}</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-12">
                {{ $banners->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
   </div>

@endsection

@push('js')
<script>
    $(function () {
        $('.pop').popover({
            container: 'body',
            animation: true
        })

    })
</script>
@endpush

@push('css')
<style>
    .pagination {
   justify-content: end;
}
</style>
@endpush
