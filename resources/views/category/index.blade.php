@extends('layouts.app')

@section('content')
    <div class="container">
        <p>
            {{ Html::linkRoute('categories.create', __('category.create.title')) }}
        </p>

        @if ($categories->count() == 0)
            <p class="lead"><i>@lang('category.index.none')</i></p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>@lang('validation.attributes.title')</th>
                        <th>@lang('category.index.number_of_articles')</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories->get() as $category)
                        <tr>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->articles->count() }}</td>
                            <td>{{ Html::linkRoute('categories.edit', __('common.edit'), $category) }}</td>
                            <td>
                                @include('shared._delete_link', ['route' => ['categories.destroy', $category]])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
