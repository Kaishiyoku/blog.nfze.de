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
    {{ Form::label('published_at', __('validation.attributes.published_at'), ['class' => 'col-lg-12 control-label']) }}

    <div class="col-lg-12">
        <div class="input-group date" id="published_at_picker" data-target-input="nearest" data-provide="datepicker">
            {{ Form::text('published_at', old('published_at', $article->published_att), ['class' => 'form-control datetimepicker-input' . ($errors->has('published_at') ? ' is-invalid' : ''), 'data-target' => '#published_at_picker']) }}

            <div class="input-group-append" data-target="#published_at_picker" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>



        @if ($errors->has('published_at'))
            <div class="invalid-feedback">
                {{ $errors->first('published_at') }}
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
        {{ Form::button($submitTitle, ['type' => 'submit', 'class' => 'btn btn-primary']) }}
    </div>
</div>