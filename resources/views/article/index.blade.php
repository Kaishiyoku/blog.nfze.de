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

                    @if ($article->isPublished())
                        @lang('article.published_at', ['date' => $article->published_at])
                    @else
                        <small><span class="text-muted">({{ __('article.to_be_published_at', ['date' => formatDateTime($article->published_at)]) }})</span></small>
                    @endif

                    <hr class="subtle"/>
                </div>
            @endforeach

        <p>
            @include('shared._pagination', ['items' => $articles])
        </p>
    </div>
@endsection
