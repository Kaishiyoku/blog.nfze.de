@extends('layouts.app')

@section('content')
    <h1>{{ __('article.create.title') }}</h1>

    {{ Form::open(['route' => 'articles.store', 'method' => 'post', 'role' => 'form']) }}
        @include('article._form', ['submitTitle' => __('common.create')])
    {{ Form::close() }}
@endsection
