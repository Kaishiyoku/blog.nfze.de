@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $article->title }}</h1>

        @if (!$article->isPublished())
            <p>
                <small><span class="text-muted">({{ __('article.to_be_published_at', ['date' => formatDateTime($article->published_at)]) }})</span></small>
            </p>
        @endif

        <div>
            {!! parseMarkdown($article->content) !!}
        </div>

        @auth
            <hr/>

            <p>
                {{ Html::linkRoute('articles.edit', __('common.edit'), [$article]) }}
            </p>
        @endauth
    </div>
@endsection
