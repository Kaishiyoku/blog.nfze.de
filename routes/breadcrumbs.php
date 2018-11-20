<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('common.breadcrumbs.home'), route('home'));
});

// Home > [Article]
Breadcrumbs::for('article', function ($trail, $article) {
    $trail->parent('home');
    $trail->push($article->title, route('articles.show', $article));
});