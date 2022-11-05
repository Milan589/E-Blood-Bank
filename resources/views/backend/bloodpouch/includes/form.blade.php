<div class="form-group">
    {!! Form::label('status', 'Is Available ') !!}
    {!! Form::radio('status', 1) !!} Yes
    {!! Form::radio('status', 0, true) !!} No
</div>

<div class="form-group">
    {{-- <div class="form-group">
        <label for="">Blood Donor</label>
        <select name="user_id" id="">
            <option value="">Select Donor Name</option>
        <option value="{{$data['bloodDonations']}}">{{$data['bloodDonations']->bloodDonor->donorName->name}}</option>
        </select>
    </div> --}}
    {!! Form::label('id', 'Blood Donor'); !!}
    {!! Form::select('id',$data['bloodDonations'], null,['class' => 'form-control','placeholder'=>'Select Donation ID']); !!}
    @include('backend.common.validation_field',['field' => 'id'])
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
