@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $article->title }}</h1>

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
