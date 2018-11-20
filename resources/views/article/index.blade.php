@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
            {{ Html::linkRoute('articles.create', __('article.create.title')) }}

            <hr/>
        @endauth

        @foreach ($articles as $article)
            <div class="pb-4">
                <h5>
                    {{ Html::linkRoute('articles.show', $article->title, [$article]) }}<br/>
                </h5>

                <p>
                    {{ $article->category->title }}

                    &diam;

                    @if ($article->isPublished())
                        @lang('article.published_at', ['date' => $article->published_at])
                    @else
                        <span class="text-warning">{{ __('article.to_be_published_at', ['date' => formatDateTime($article->published_at, __('common.unknown'))]) }}</span>
                    @endif
                </p>

                <hr class="subtle"/>
            </div>
        @endforeach

        <p>
            @include('shared._pagination', ['items' => $articles])
        </p>
    </div>
@endsection
