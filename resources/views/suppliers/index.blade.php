@extends('layouts.master_tables')

@section('title', 'Suppliers')

@section('content')
    <div class="row" style="dir:rtl">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
              {{session()->get('name') }}
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="ibox-title">
                    <h5>Suppliers Table Data</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example nowrap">
                            <thead>
                            <tr>
                                <th class="text-center">Code</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">address</th>

                                <th class="text-center">actions</th>
                            </tr>
                            </thead>
                            <a href="{{ route('Suppliers.create')}}" class="btn btn-success">New Supplier</a>
                            <tbody>
                            @foreach ($suppliers as $key => $supplier)
                                <tr class="gradeX">
                                    <td class="text-center">
                                      {{ $supplier->code }}
                                    </td>
                                    <td class="text-center">{{ $supplier->name }}</td>
                                    <td class="text-center">{{ $supplier->phone }}</td>
                                    <td class="text-center">{{ $supplier->address1 }}</td>



                                    <td class="text-center">

                                        <a class="btn btn-xs btn-primary"
                                           href="{{ route('Suppliers.edit',$supplier->id) }}"><i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('Suppliers/'.$supplier->id) }}" method="POST"
                                              style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" id="delete-task-{{ $supplier->id }}"
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
