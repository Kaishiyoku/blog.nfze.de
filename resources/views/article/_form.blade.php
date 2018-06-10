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

        <small id="published_at_help_block" class="form-text text-muted">
            {{ __('article.help.published_at') }}
        </small>

        @if ($errors->has('published_at'))
            <div class="invalid-feedback">
                {{ $errors->first('published_at') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group row">
    {{ Form::label('content', __('validation.attributes.content'), ['class' => 'col-lg-12 control-label']) }}

    <div class="col-lg-12" id="contentContainer">
        <div class="text-right">
            <div class="btn-group" role="group">
                <button type="button" data-provide="fullscreen" data-target="#contentContainer" class="btn btn-outline-dark btn-sm">
                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                    {{ __('article.form.fullscreen') }}
                </button>

                <button type="button" data-provide="preview" class="btn btn-outline-dark btn-sm">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    {{ __('article.form.preview') }}
                </button>
            </div>
        </div>

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

<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewModalLabel">{{ __('article.preview.title') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="previewModalBody">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('common.close') }}</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('[data-provide="preview"]').click(function () {
            $.post('{{ route('articles.preview') }}', {
                _token: '{{ csrf_token() }}',
                content: $('textarea[name="content"]').val(),
            }).done(function(data) {
                $('#previewModalBody').html(data);

                $('#previewModal').modal();
            });
        });

        $('[data-provide="fullscreen"]').click(function () {
            $this = $(this);

            $($this.attr('data-target')).toggleClass('fullscreen-editor-container');
        });
    });
</script>