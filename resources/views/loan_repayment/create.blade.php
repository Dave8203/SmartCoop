@extends('layouts.master')
@section('title')
    {{trans_choice('general.app_name',1)}} | {{trans_choice('general.new_payment',1)}}
@endsection
@section('content')
<!---<link rel="icon" href="http://jgconsultoreslegales.com/favicon.ico" type="image/x-icon" />--->
    <div class="panel panel-white">
        <div class="panel-heading">
            <h6 class="panel-title">{{trans_choice('general.payment_form',1)}}<!---{{trans_choice('general.add',1)}} {{trans_choice('general.repayment',1)}}---></h6>

            <div class="heading-elements">

            </div>
        </div>
        {!! Form::open(array('url' => url('loan/'.$loan->id.'/repayment/store'), 'method' => 'post', 'class' => 'form-horizontal')) !!}
        <div class="panel-body">

            <div class="form-group">
                {!! Form::label('amount',trans_choice('general.amount',1).' '.trans_choice('general.of',1).' '.trans_choice('general.repayment',1),array('class'=>'col-sm-3 control-label')) !!}
                <div class="col-sm-5">
                    {!! Form::text('amount',null, array('class' => 'form-control touchspin', 'placeholder'=>trans_choice('general.enter_amount_without_comma',1),'required'=>'required')) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('repayment_method_id',trans_choice('general.method',1).' '.trans_choice('general.of',1).' '.trans_choice('general.repayment',1),array('class'=>'col-sm-3 control-label')) !!}
                <div class="col-sm-5">
                    {!! Form::select('repayment_method_id',$repayment_methods,null, array('class' => ' form-control','required'=>'required','id'=>'loanProduct')) !!}
                </div>
            </div>
            <!-- Normal and Capital -->
            <div class="form-group">
                <label class="col-sm-3 control-label">{{trans_choice('general.payment_type',1)}}</label>
                <div class="col-sm-5">
                    <select id="repayment_type" name="repayment_type" class="form-control">
                        <option value="1">{{trans_choice('general.pay_fee',1)}}</option>
                        {{--<option value="2">{{trans_choice('general.capital_subscription',1)}}</option>
                        <option value="3">{{trans_choice('general.interest_payment',1)}}</option>
                        <option value="4">{{trans_choice('general.amount_more',1)}}</option>--}}
                    </select>
                </div>
            </div>
            <div style="display: none;" class="form-group">
                {!! Form::label('receipt',trans_choice('general.receipt',1),array('class'=>'col-sm-3 control-label')) !!}
                <div class="col-sm-5">
                    {!! Form::text('receipt',"CD" . $loan->id . "0" . $loan->loan_product->id . date("Ymd") . date("his"), array('class' => 'form-control', 'placeholder'=>"", 'required'=>'required')) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('collection_date',trans_choice('general.first_payment_date',1),array('class'=>'col-sm-3 control-label')) !!}
                <div class="col-sm-5">
                    {!! Form::text('collection_date',date("Y-m-d"), array('class' => 'form-control date-picker', 'placeholder'=>"",'required'=>'required')) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('notes',trans_choice('general.comment', 2),array('class'=>'col-sm-3 control-label')) !!}
                <div class="col-sm-9">
                    {!! Form::textarea('notes',null, array('class' => 'form-control', 'rows'=>"4")) !!}
                </div>
            </div>
            <p style="display: none;" class="bg-navy disabled color-palette">{{trans_choice('general.custom_field',2)}}</p>
            @foreach($custom_fields as $key)

                <div class="form-group">
                    {!! Form::label($key->id,$key->name,array('class'=>'')) !!}
                    @if($key->field_type=="number")
                        <input type="number" class="form-control" name="{{$key->id}}"
                               @if($key->required==1) required @endif>
                    @endif
                    @if($key->field_type=="textfield")
                        <input type="text" class="form-control" name="{{$key->id}}"
                               @if($key->required==1) required @endif>
                    @endif
                    @if($key->field_type=="date")
                        <input type="text" class="form-control date-picker" name="{{$key->id}}"
                               @if($key->required==1) required @endif>
                    @endif
                    @if($key->field_type=="textarea")
                        <textarea class="form-control" name="{{$key->id}}"
                                  @if($key->required==1) required @endif></textarea>
                    @endif
                    @if($key->field_type=="decimal")
                        <input type="text" class="form-control touchspin" name="{{$key->id}}"
                               @if($key->required==1) required @endif>
                    @endif
                </div>
            @endforeach

        </div>
        <!-- /.panel-body -->
        <div class="panel-footer">
            <div class="heading-elements">
                <button type="submit" class="btn btn-primary pull-right">{{trans_choice('general.save',1)}}</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <!-- /.box -->

@endsection

