@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
            {{ Html::linkRoute('articles.create', __('article.create.title')) }}

            <hr/>
        @endauth

        @foreach ($articles as $article)
            <h3>{{ Html::linkRoute('articles.show', $article->title, [$article]) }}</h3>
        @endforeach
    </div>
@endsection
