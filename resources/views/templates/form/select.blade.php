<div class="form-group col-md-6">
    <label for="{{ $select }}">{{ $label ?? $select}}</label>
    {!! Form::select($select, $data ?? [], null, ['class' => 'form-control']) !!}
</div>
