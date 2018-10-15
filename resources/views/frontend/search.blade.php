@extends('frontend.layout.app')
@section('title', 'Search')
@section('content')
@include('frontend.service.list_service')
{{-- <div class="text-center">{{ $services->links('frontend.vendor.pagination') }}</div> --}}

@endsection