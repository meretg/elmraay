@extends('layouts.master_tables')

@section('title', 'items')

@section('content')
    <div class="row" style="dir:rtl">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="ibox-title">
                    <h5>items Table Data</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example nowrap">
                            <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">quantity</th>

                                <th class="text-center"></th>
                            </tr>
                            </thead>
                            <a href="{{ route('Items.create')}}" class="btn btn-success">New Item</a>
                            <tbody>
                            @foreach ($items as $key => $item)
                                <tr class="gradeX">
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-info"
                                           href="{{ route('Items.show',$item->id) }}">
                                            <i class="fa fa-external-link"></i> {{ "cus_".$item->id }}</a>
                                    </td>
                                    <td class="text-center">{{ $item->name }}</td>
                                    <td class="text-center">{{ $item->quantity }}</td>

                                    <td class="text-center">
                                        <a class="btn btn-xs btn-info"
                                           href="{{ route('Items.show',$item->id) }}"><i
                                                    class="fa fa-external-link"></i> </a>
                                        <a class="btn btn-xs btn-primary"
                                           href="{{ route('Items.edit',$item->id) }}"><i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('items/'.$item->id) }}" method="POST"
                                              style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" id="delete-task-{{ $item->id }}"
                                                    class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
