{{-- <div class="form-group">
    {!! Form::label('donated_date', 'Donated Date'); !!}
    {!! Form::date('donated_date', null,['class' => 'form-control']); !!}
    @include('backend.common.validation_field',['field' => 'donated_date'])
</div>
<div class="form-group">
    {!! Form::label('amount', 'Amount in ml'); !!}
    {!! Form::text('amount', null,['class' => 'form-control']); !!}
    @include('backend.common.validation_field',['field' => 'amount'])
</div>
<div class="form-group">
    {!! Form::label('b_id', 'Blood Bank Name'); !!}
    {!! Form::select('b_id',$data['bankNames'], null,['class' => 'form-control','placeholder' => 'Select Bank name']); !!}
    @include('backend.common.validation_field',['field' => 'b_id'])
</div>
<div class="form-group">
    {!! Form::label('user_id', 'Blood Donor Name'); !!}
    {!! Form::select('user_id',$data['donorNames'],null,['class' => 'form-control','placeholder' => 'Select Donor Name']); !!}
    @include('backend.common.validation_field',['field' => 'user_id'])
</div>
<div class="form-group">
    <label for="">Status:</label>
    <input type="radio" name="status" id="active" value="1">Active
    <input type="radio" name="status" id="deactive" value="0" checked>Deactive
</div>
<div class="form-group">
    {!! Form::submit($button . ' ' . $module, ['class' => 'btn btn-info']); !!}
    {!! Form::reset('Clear', ['class' => 'btn btn-danger']); !!}
</div> --}}
