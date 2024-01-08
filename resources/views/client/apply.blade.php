@extends('client.layout')
@section('title')
    {{ trans_choice('general.apply',1) }}
@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-white">
                <div class="panel-heading">
                    <h6 class="panel-title">{{ trans_choice('general.apply',1) }}</h6>

                    <div class="heading-elements">
                    </div>
                </div>
                {!! Form::open(array('url' => url('client/application/store'), 'method' => 'post', 'name' => 'form',"enctype"=>"multipart/form-data")) !!}
                <div class="panel-body">
                    <div class="form-group">
                        {!! Form::label('branch_id',trans_choice('general.branch',1),array('class'=>'')) !!}
                        {!! Form::select('branch_id',$branches,null, array('class' => 'form-control','placeholder'=>'','required'=>'required')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('loan_product_id',trans_choice('general.product',1),array('class'=>'')) !!}
                        {!! Form::select('loan_product_id',$products,null, array('class' => 'form-control','placeholder'=>'','required'=>'required')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('amount',trans_choice('general.amount',1),array('class'=>'')) !!}
                        {!! Form::text('amount',null, array('class' => 'form-control touchspin', 'placeholder'=>'','required'=>'required')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('amount',trans_choice('general.instruction',1),array('class'=>'')) !!}
                        <br>
                        <a href="/download/loan.pdf" target="_blank" class="btn btn-primary"> Loan Application Form</a>
                        {!! Form::label('',null, array('class' => 'form-control', ''=>'','required'=>'required')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('notes',trans_choice('general.note',2),array('class'=>'')) !!}
                        {!! Form::textarea('notes',null, array('class' => 'form-control', 'rows'=>"3")) !!}
                    </div>
                    <div class="form-group ">
                        {!! Form::label('files',trans_choice('general.application_form',1),array('class'=>'col-sm-3 control-label')) !!}
                        <div class="col-sm-5">
                            {!! Form::file('files[]', array('class' => 'form-control file-styled', 'multiple'=>"multiple")) !!}
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-group">
                        {!! Form::label('files',trans_choice('general.salary_pay_slips',1),array('class'=>'col-sm-3 control-label')) !!}
                        <div class="col-sm-5">
                            {!! Form::file('files[]', array('class' => 'form-control file-styled', 'multiple'=>"multiple")) !!}
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        {!! Form::label('files',trans_choice('general.certification_for_bonus_loan',1),array('class'=>'col-sm-3 control-label')) !!}
                        <div class="col-sm-5">
                            {!! Form::file('files[]', array('class' => 'form-control file-styled', 'multiple'=>"multiple")) !!}
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        {!! Form::label('files',trans_choice('general.insurance_form_regular_loan',1),array('class'=>'col-sm-3 control-label')) !!}
                        <div class="col-sm-5">
                            {!! Form::file('files[]', array('class' => 'form-control file-styled', 'multiple'=>"multiple")) !!}
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group">
                        {!! Form::label('files',trans_choice('general.authenticated_pay_roll',1),array('class'=>'col-sm-3 control-label')) !!}
                        <div class="col-sm-5">
                            {!! Form::file('files[]', array('class' => 'form-control file-styled', 'multiple'=>"multiple")) !!}
                        </div>
                        <div class="col-sm-4">
                        </div>
                    </div>
                    <br>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary pull-right">{{trans_choice('general.save',1)}}</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

        });
    </script>
@endsection
