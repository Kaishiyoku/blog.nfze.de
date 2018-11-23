@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('category.edit.title', ['title' => $category->title]) }}</h1>

        {{ Form::open(['route' => ['categories.update', $category], 'method' => 'put', 'role' => 'form']) }}
            @include('category._form', ['submitTitle' => __('common.update')])
        {{ Form::close() }}
    </div>
@endsection
