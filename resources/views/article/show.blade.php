@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('article', $article))

@section('content')
    <div class="container">
        <h1>{{ $article->title }}</h1>

        <p class="text-muted">
            {{ $article->category->title }}

            &diam;

            @if ($article->isPublished())
                @lang('article.published_at', ['date' => $article->published_at])
            @else
                <span class="text-warning">{{ __('article.to_be_published_at', ['date' => formatDateTime($article->published_at, __('common.unknown'))]) }}</span>
            @endif
        </p>

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
