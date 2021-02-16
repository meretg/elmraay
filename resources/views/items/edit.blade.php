@extends('layouts.master')

@section('title', 'Edit item')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit item</div>

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


                        <form class="form-horizontal" enctype="multipart/form-data" action = "updateitem" method = "post">

                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">الاسم</label>
                                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                <input type="hidden"  id="item_id" value="{{$item->id }}">

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{$item->name}}"
                                           required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                                <label for="quantity" class="col-md-4 control-label">كميه</label>

                                <div class="col-md-6">
                                    <input id="quantity" type="text" class="form-control" name="quantity"
                                           value="{{$item->quantity}}"
                                           required autofocus>

                                    @if ($errors->has('quantity'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>








                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="button" onclick="update()"  class="btn btn-primary">
                                        Update
                                    </button>

                                    <a class="btn btn-link" href="{{ url('Items') }}">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>

function update()
{


  $.ajax({
    url: "{{ URL::to('updateitem') }}",
    type: "post",
    dataType: 'json',
    data: {"_token":$('#_token').val(),
    "name":$('#name').val(),
    "quantity":$('#quantity').val(),
"id":$('#item_id').val()},
    success: function(response)
    {
      //if(response['errors'])
    //  {


    /*  if(response['errors'].phone)
      {var html="";
        for(var i=0;i<response['errors'].phone.length;i++){
        html+=''+response["errors"].phone[i]+'<br>'
      }
        $("#olddoctor_phoneinvalid").html(html);
      }
      if(response['errors'].type)
      {
        $("#olddoctor_typeinvalid").html(response['errors'].type);
      }
      if(response['errors'].docName)
      {
        $("#olddoctor_nameinvalid").html(response['errors'].docName);
      }

    }
      else if(response.success)
      {*/
      //  location.reload();
    //  }
    //  location.reload();
    window.location.href = "/Items";
    //window.location.replace("suppliers");




   }



    });

}
</script>
