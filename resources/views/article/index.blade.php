@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
            {{ Html::linkRoute('articles.create', __('article.create.title')) }}

            <hr/>
        @endauth

        @foreach ($articles->get() as $article)
            {{ Html::linkRoute('articles.show', $article->title, [$article]) }}

            @if (!$article->isPublished())
                (unpublished)
            @endif
            <br/>
        @endforeach
    </div>
@endsection
