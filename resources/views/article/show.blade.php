@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('article', $article))

@section('content')
    <div class="container">
        <h1>{{ $article->title }}</h1>

        @if ($article->isPublished())
            <p>
                <span class="text-muted">@lang('article.published_at', ['date' => $article->published_at])</span>
            </p>
        @else
            <p>
                <span class="text-muted">({{ __('article.to_be_published_at', ['date' => formatDateTime($article->published_at)]) }})</span>
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
