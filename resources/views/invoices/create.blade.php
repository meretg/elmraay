@extends('layouts.master')

@section('title', 'Create Customer')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> اضافه مورد</div>
                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('Invoices') }}">
                        {{ csrf_field() }}

                        <div class="col-md-6">
                            <legend class="section">Basic & Contact Info</legend>
                            <div class="form-group required{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">رقم الفاتوره</label>
                                <div class="col-md-6">
                                    <input id="num"  type="text" class="form-control"
                                           value="{{ old('num') }}" required autofocus>
                                    @if ($errors->has('num'))
                                        <span class="help-block"><strong>{{ $errors->first('num') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required{{ $errors->has('date') ? ' has-error' : '' }}">
                                <label for="date" class="col-md-4 control-label">التاريخ</label>
                                <div class="col-md-6">
                                    <input id="date" name="date" type="date" class="form-control"
                                           value="{{ old('address1') }}" required>
                                    @if ($errors->has('date'))
                                        <span class="help-block"><strong>{{ $errors->first('date') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('supplier') ? ' has-error' : '' }}">
                                <label for="supplier" class="col-md-4 control-label">مورد</label>
                                <div class="col-md-6">

                                  <select class="custom-select form-control" style="width:350px;"name= "type" id="supplier_id2" >
                                    @foreach ($suppliers as $key => $supplier)

   <option  value="{{$supplier->id}}">{{$supplier->name}}</option>

   @endforeach

   </select>
                                </div>
                                <input type="hidden"  id="supplier_id" value="">

                            </div>
                            <div class="form-group{{ $errors->has('freight_cost') ? ' has-error' : '' }}">
                                <label for="freight_cost" class="col-md-4 control-label">تكلفة الشحن</label>
                                <div class="col-md-6">
                                    <input id="freight_cost" name="freight_cost" type="text" class="form-control"
                                           value="{{ old('freight_cost') }}">
                                    @if ($errors->has('freight_cost'))
                                        <span class="help-block"><strong>{{ $errors->first('freight_cost') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('other_expenses') ? ' has-error' : '' }}">
                                <label for="other_expenses" class="col-md-4 control-label">نفقات أخرى</label>
                                <div class="col-md-6">
                                    <input id="other_expenses" name="other_expenses" type="text" class="form-control"
                                           value="{{ old('other_expenses') }}">
                                    @if ($errors->has('other_expenses'))
                                        <span class="help-block"><strong>{{ $errors->first('other_expenses') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                                <label for="discount" class="col-md-4 control-label">خصم</label>
                                <div class="col-md-6">
                                    <input id="discount" name="discount" type="text" class="form-control"
                                           value="{{ old('discount') }}">
                                    @if ($errors->has('discount'))
                                        <span class="help-block"><strong>{{ $errors->first('discount') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('paid') ? ' has-error' : '' }}">
                                <label for="paid" class="col-md-4 control-label">مدفوعات</label>
                                <div class="col-md-6">
                                    <input id="paid" name="paid" type="text" class="form-control"
                                           value="{{ old('paid') }}">
                                    @if ($errors->has('paid'))
                                        <span class="help-block"><strong>{{ $errors->first('paid') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('debt') ? ' has-error' : '' }}">
                                <label for="debt" class="col-md-4 control-label">ديون</label>
                                <div class="col-md-6">
                                    <input id="debt" name="debt" type="text" class="form-control"
                                           value="{{ old('debt') }}">
                                    @if ($errors->has('debt'))
                                        <span class="help-block"><strong>{{ $errors->first('debt') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                                <label for="notes" class="col-md-4 control-label">ملاحظات</label>
                                <div class="col-md-6">
                                    <input id="notes" name="notes" type="text" class="form-control"
                                           value="{{ old('notes') }}">
                                    @if ($errors->has('notes'))
                                        <span class="help-block"><strong>{{ $errors->first('notes') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('total') ? ' has-error' : '' }}">
                                <label for="total" class="col-md-4 control-label">الاجمالى</label>
                                <div class="col-md-6">
                                    <input id="total" name="total" type="text" class="form-control"
                                           value="{{ old('total') }}">
                                    @if ($errors->has('total'))
                                        <span class="help-block"><strong>{{ $errors->first('total') }}</strong></span>
                                    @endif
                                </div>
                            </div>







                            <legend class="section"></legend>
                            <div class="form-group required{{ $errors->has('status') ? ' has-error' : '' }}">

                            </div>



                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"> Save</button>
                                <a class="btn btn-link" href="{{ url('Invoices') }}"> Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
//var x = document.getElementsById("supplier_id");
//document.getElementById("supplier_id");

console.log( document.getElementById("num").value)
</script>
@section('scripts')
    @include('layouts.more_scripts')
@endsection
