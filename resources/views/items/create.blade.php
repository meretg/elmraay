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

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('Items') }}">
                        {{ csrf_field() }}

                        <div class="col-md-6">
                            <legend class="section">Basic & Contact Info</legend>
                            <div class="form-group required{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">اسم الصنف</label>
                                <div class="col-md-6">
                                    <input id="name" name="name" type="text" class="form-control"
                                           value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group required{{ $errors->has('quantity') ? ' has-error' : '' }}">
                                <label for="quantity" class="col-md-4 control-label">الكميه</label>
                                <div class="col-md-6">
                                    <input id="quantity" name="quantity" type="text" class="form-control"
                                           value="{{ old('quantity') }}" required>
                                           <input id="state" name="state" type="hidden" class="form-control"
                                                  value=1>
                                    @if ($errors->has('quantity'))
                                        <span class="help-block"><strong>{{ $errors->first('quantity') }}</strong></span>
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
                                <a class="btn btn-link" href="{{ url('Items') }}"> Cancel</a>
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
