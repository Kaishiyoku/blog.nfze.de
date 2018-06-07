@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('article.edit.title', ['title' => $article->title]) }}</h1>

        {{ Form::open(['route' => ['articles.update', $article], 'method' => 'put', 'role' => 'form']) }}
            @include('article._form', ['submitTitle' => __('common.update')])
        {{ Form::close() }}
    </div>
@endsection
