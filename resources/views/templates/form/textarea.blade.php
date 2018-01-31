<div class="form-group col-md-6">
    {!! Form::label($input, $attributes['placeholder'] ?? $input, ['class' => 'control-label']) !!}
    {!! Form::textarea($input, $value ?? null, array_merge(['class' => 'form-control'], $attributes)) !!}
</div>
