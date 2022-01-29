<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $cart->user_id }}</p>
</div>

<!-- Is Paid Field -->
<div class="form-group">
    {!! Form::label('is_paid', 'Is Paid:') !!}
    <p>{{ $cart->is_paid }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $cart->amount }}</p>
</div>

<!-- Deliver Address Field -->
<div class="form-group">
    {!! Form::label('deliver_address', 'Deliver Address:') !!}
    <p>{{ $cart->deliver_address }}</p>
</div>

