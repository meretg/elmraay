<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Invoice;
use App\Supplier;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $invoices = Invoice::all();

        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('bowner.Invoice.create');
        $suppliers = Supplier::all();
        return view('Invoices.create', compact('suppliers'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      $Invoice = new Invoice();

      /*  $this->validate($request, [
            'phone' => 'required|digits_between:9,11|unique:Invoices',
        ]);*/

        $Invoice->num = $request->num;
        $Invoice->date = $request->date;
        $Invoice->freight_cost = $request->freight_cost;

        $Invoice->other_expenses = $request->other_expenses;
        $Invoice->discount = $request->discount;
        $Invoice->paid= $request->paid;
        $Invoice->debt = $request->debt;
        $Invoice->notes = $request->notes;
        $Invoice->supplier_id = $request->supplier_id;
        $Invoice->total= $request->total;
        $Invoice->save();

        Session::flash('created_message', 'The new Invoice has been added');

      /*  return redirect('/bowner/Invoice');
        $this->validate($request, [
            'name' => 'required|max:255',
            'address1' => 'max:255',

            'phone' => 'max:255',
            'code' => 'max:255',

                   'pricebook_id' => 'max:255',
        ]);
        $input = $request->only('name',
            'address1', 'phone', 'code'
          );*/
        $result = Invoice::create($input);
        return redirect()->route('Invoices.index')
            ->with('success', 'Invoice created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Invoice = Invoice::findOrFail($id);

        return view('Invoices.edit', compact('Invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $Invoice = Invoice::findOrFail($request->id);

      /*  $this->validate($request, [
            'phone' => 'required|digits_between:9,11,phone,'.$Invoice->id,
        ]);*/

        $Invoice->num = $request->num;
        $Invoice->date = $request->date;
        $Invoice->freight_cost = $request->freight_cost;

        $Invoice->other_expenses = $request->other_expenses;
        $Invoice->discount = $request->discount;
        $Invoice->paid= $request->paid;
        $Invoice->debt = $request->debt;
        $Invoice->notes = $request->notes;
        $Invoice->supplier_id = $request->supplier_id;
        $Invoice->total= $request->total;
        $Invoice->save();

        Session::flash('update_message', 'The new Invoice has been updated');

      //  return redirect('Invoices.index');
      $response = array(
        'status' => 'success',
        'msg' => 'The new Invoice has been updated',
    );
   return response()->json($response);
    //return redirect()->action('InvoiceController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
      /*  $Invoice = Invoice::findOrFail($id);

        $Invoice->delete();

        Session::flash('deleted_message', 'The Invoice has been deleted');

        return redirect('/bowner/Invoice');*/
        Invoice::find($id)->delete();
        return redirect()->route('Invoices.index')
            ->with('success', 'Invoice deleted successfully');
    }
}
