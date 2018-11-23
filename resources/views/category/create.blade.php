@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('category.create.title') }}</h1>

        {{ Form::open(['route' => 'categories.store', 'method' => 'post', 'role' => 'form']) }}
            @include('category._form', ['submitTitle' => __('common.create')])
        {{ Form::close() }}
    </div>
@endsection
