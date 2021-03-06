<div class="form-group row">
    {{ Form::label('title', __('validation.attributes.title'), ['class' => 'col-lg-12 control-label']) }}

    <div class="col-lg-12">
        {{ Form::text('title', old('title', $category->title), ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'required' => true]) }}

        @if ($errors->has('title'))
            <div class="invalid-feedback">
                {{ $errors->first('title') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-lg-12">
        {{ Form::button($submitTitle, ['type' => 'submit', 'class' => 'btn btn-primary']) }}
    </div>
</div>