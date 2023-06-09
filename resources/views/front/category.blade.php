@extends('front.template')

@section('meta_description', $category->meta_description)
@section('meta_keywords', $category->meta_keywords)
@section('meta_title', $category->meta_title)

@section('content')

  <!-- Category Heading -->
<div class="page-heading">
    <div class="container-fluid ">
        <div class="row align-items-center">
            <div class="col-md-7 ">
                <h1>{{ $category->title }}</h1>
                <img src="/images/categories/{{ $category->photo }}"  class="d-flex justify-content-center">
            </div>
            <div class="col-md-5">
                <h2>{{ $category->subtitle }}</h2>

                    {!! $category->excerpt !!}

                <p><span class="text-info">{{ $category->views }}<span> - views</p>
            </div>
        </div>
    </div>
</div>

@endsection
