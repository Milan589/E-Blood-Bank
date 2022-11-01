<div class="form-group">
    {!! Form::label('role_id', 'Role'); !!}
    {!! Form::select('role_id',$data['roles'], null,['class' => 'form-control','placeholder' => 'Select role']); !!}
    @include('backend.common.validation_field',['field' => 'role_id'])
</div>
<div class="form-group">
    {!! Form::label('name', 'Name'); !!}
    {!! Form::text('name', null,['class' => 'form-control']); !!}
    @include('backend.common.validation_field',['field' => 'name'])
</div>
<div class="form-group">
    {!! Form::label('phone', 'Phone'); !!}
    {!! Form::text('phone', null,['class' => 'form-control']); !!}
    @include('backend.common.validation_field',['field' => 'phone'])
</div>
<div class="form-group">
    {!! Form::label('email', 'Email'); !!}
    {!! Form::text('email', null,['class' => 'form-control']); !!}
    @include('backend.common.validation_field',['field' => 'email'])
</div>
<div class="form-group">
    {!! Form::label('password', 'Password'); !!}
    {!! Form::password('password',['class' => 'form-control']); !!}
    @include('backend.common.validation_field',['field' => 'password'])
</div>
<div class="form-handler">
    {!! Form::label('bloodgroup', 'Blood Group'); !!}
    {!! Form::select('bg_id', $data['bloodGroups'], null, [
        'class' => 'form-control',
        'placeholder' => 'Select Blood Groups',
    ]) !!}
    @include('backend.common.validation_field', ['field' => 'bg_name'])
</div>
<div class="form-group">
    {!! Form::submit($button . ' ' . $module, ['class' => 'btn btn-info']); !!}
    {!! Form::reset('Clear', ['class' => 'btn btn-danger']); !!}
</div>
