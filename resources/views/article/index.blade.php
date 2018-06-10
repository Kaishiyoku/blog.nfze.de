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
                <small><span class="text-muted">({{ __('article.to_be_published_at', ['date' => formatDateTime($article->published_at)]) }})</span></small>
            @endif
            <br/>
        @endforeach
    </div>
@endsection
