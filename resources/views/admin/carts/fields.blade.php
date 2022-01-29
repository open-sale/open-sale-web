<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Paid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_paid', 'Is Paid:') !!}
    {!! Form::number('is_paid', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Deliver Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deliver_address', 'Deliver Address:') !!}
    {!! Form::text('deliver_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.carts.index') }}" class="btn btn-secondary">Cancel</a>
</div>
