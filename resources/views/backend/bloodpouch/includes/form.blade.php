<div class="form-group">
    {!! Form::label('status', 'Is Available ') !!}
    {!! Form::radio('status', 1) !!} Yes
    {!! Form::radio('status', 0, true) !!} No
</div>

<div class="form-group">
    {!! Form::label('bd_id', 'Blood Donor'); !!}
    {!! Form::select('bd_id',$data['bloodDonations'], null,['class' => 'form-control','placeholder'=>'Select Donation ID']); !!}
    @include('backend.common.validation_field',['field' => 'bd_id'])
</div>
<div class="form-group">
    {!! Form::label('bg_id', 'Blood Group'); !!}
    {!! Form::select('bg_id',$data['bloodGroups'], null,['class' => 'form-control' ,'placeholder'=>'Select Blood Group']); !!}
    @include('backend.common.validation_field',['field' => 'bg_id'])
</div>
<div class="form-group">
    {!! Form::submit($button . ' ' . $module, ['class' => 'btn btn-info']); !!}
    {!! Form::reset('Clear', ['class' => 'btn btn-danger']); !!}
</div>
