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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('Suppliers') }}">
                        {{ csrf_field() }}

                        <div class="col-md-6">
                            <legend class="section">Basic & Contact Info</legend>
                            <div class="form-group required{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">الاسم</label>
                                <div class="col-md-6">
                                    <input id="name" name="name" type="text" class="form-control"
                                           value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required{{ $errors->has('address1') ? ' has-error' : '' }}">
                                <label for="address1" class="col-md-4 control-label">عنوان</label>
                                <div class="col-md-6">
                                    <input id="address1" name="address1" type="text" class="form-control"
                                           value="{{ old('address1') }}" required>
                                    @if ($errors->has('address1'))
                                        <span class="help-block"><strong>{{ $errors->first('address1') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                                <label for="code" class="col-md-4 control-label">كود</label>
                                <div class="col-md-6">
                                    <input id="code" name="code" type="text" class="form-control"
                                           value="{{ old('code') }}">
                                    @if ($errors->has('code'))
                                        <span class="help-block"><strong>{{ $errors->first('code') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">رقم تليفون</label>
                                <div class="col-md-6">
                                    <input id="phone" name="phone" type="text" class="form-control"
                                           value="{{ old('phone') }}">
                                           <input id="state" name="state" type="hidden" class="form-control"
                                                  value=1>
                                    @if ($errors->has('phone'))
                                        <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
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
                                <a class="btn btn-link" href="{{ url('Suppliers') }}"> Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('layouts.more_scripts')
@endsection
