<div class="form-group">
    {!! Form::label('bank_name', 'Blood Bank Name'); !!}
    {!! Form::text('bank_name', null,['class' => 'form-control']); !!}
    @include('backend.common.validation_field',['field' => 'bank_name'])
</div>
<div class="form-group">
    {!! Form::label('bt_id', 'Bank Type'); !!}
    {!! Form::select('bt_id',$data['banktypes'], null,['class' => 'form-control','placeholder' => 'Select bank type']); !!}
    @include('backend.common.validation_field',['field' => 'bt_id'])
</div>
<div class="form-group">
    {!! Form::label('l_id', 'Location'); !!}
    {!! Form::select('l_id',$data['locations'], null,['class' => 'form-control','placeholder' => 'Select location']); !!}
    @include('backend.common.validation_field',['field' => 'l_id'])
</div>
<div class="form-group">
    {!! Form::submit($button . ' ' . $module, ['class' => 'btn btn-info']); !!}
    {!! Form::reset('Clear', ['class' => 'btn btn-danger']); !!}
</div>
