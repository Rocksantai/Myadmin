@extends('front.template')

@section('meta_description', 'Pagina Home')
@section('meta_keywords', 'Web Design')
@section('meta_title', 'Home | Web')


@section('content')
@include('front.partials.banner')
@include('front.partials.categories')

@endsection
