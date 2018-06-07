<div class="form-group row">
    {{ Form::label('title', __('validation.attributes.title'), ['class' => 'col-lg-12 control-label']) }}

    <div class="col-lg-12">
        {{ Form::text('title', old('title', $article->title), ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'required' => true]) }}

        @if ($errors->has('title'))
            <div class="invalid-feedback">
                {{ $errors->first('title') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group row">
    {{ Form::label('content', __('validation.attributes.content'), ['class' => 'col-lg-12 control-label']) }}

    <div class="col-lg-12">
        {{ Form::textarea('content', old('content', $article->content), ['class' => 'form-control text-monospace' . ($errors->has('content') ? ' is-invalid' : '')]) }}

        @if ($errors->has('content'))
            <div class="invalid-feedback">
                {{ $errors->first('content') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-12">
        {{ Form::button($submitTitle, ['type' => 'submit', 'class' => 'btn btn-outline-primary']) }}
    </div>
</div>