@extends('layouts.master_tables')

@section('title', 'Invoices')

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
                    <h5>Suppliers Table Data</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example nowrap">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">num</th>
                                <th class="text-center">date</th>
                                <th class="text-center">freight_cost</th>
                                <th class="text-center">other_expenses</th>
                                <th class="text-center">discount</th>
                                <th class="text-center">paid</th>
                                <th class="text-center">debt</th>
                                <th class="text-center">notes</th>
                                <th class="text-center">supplier</th>
                                <th class="text-center">total</th>
                                <th class="text-center"></th>
                            </tr>
                            </thead>
                            <a href="{{ route('Invoices.create')}}" class="btn btn-success">New Invoice</a>
                            <tbody>
                            @foreach ($invoices as $key => $invoice)
                                <tr class="gradeX">
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-info"
                                           href="{{ route('Suppliers.show',$invoice->id) }}">
                                            <i class="fa fa-external-link"></i> {{ "cus_".$invoice->id }}</a>
                                    </td>
                                    <td class="text-center">{{ $invoice->num }}</td>
                                    <td class="text-center">{{ $invoice->date }}</td>
                                    <td class="text-center">{{ $invoice->freight_cost }}</td>

                                    <td class="text-center">{{ $invoice->other_expenses }}</td>
                                    <td class="text-center">{{ $invoice->discount }}</td>
                                    <td class="text-center">{{ $invoice->paid }}</td>

                                    <td class="text-center">{{ $invoice->debt }}</td>
                                    <td class="text-center">{{ $invoice->notes }}</td>
                                    <td class="text-center">{{ $invoice->supplier }}</td>

                                    <td class="text-center">{{ $invoice->total }}</td>
                              

                                    <td class="text-center">
                                        <a class="btn btn-xs btn-info"
                                           href="{{ route('Suppliers.show',$invoice->id) }}"><i
                                                    class="fa fa-external-link"></i> </a>
                                        <a class="btn btn-xs btn-primary"
                                           href="{{ route('Suppliers.edit',$invoice->id) }}"><i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ url('Suppliers/'.$invoice->id) }}" method="POST"
                                              style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" id="delete-task-{{ $invoice->id }}"
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
