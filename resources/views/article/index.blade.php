@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
            {{ Html::linkRoute('articles.create', __('article.create.title')) }}

            <hr/>
        @endauth

        <ul>
            @foreach ($articles->get() as $article)
                <li>
                    {{ Html::linkRoute('articles.show', $article->title, [$article]) }}

                    <small class="float-right">{{ $article->published_at }}</small>

                    @if (!$article->isPublished())
                        <small><span class="text-muted">({{ __('article.to_be_published_at', ['date' => formatDateTime($article->published_at)]) }})</span></small>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endsection
