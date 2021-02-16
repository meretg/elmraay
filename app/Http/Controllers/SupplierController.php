<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$suppliers = Supplier::all();
        $suppliers = Supplier::where('state', 1)
                       ->orderBy('id')
                       ->get();
        return view('Suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('bowner.supplier.create');
        $suppliers = Supplier::all();
        return view('Suppliers.create', compact('suppliers'));

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
        /*$supplier = new Supplier();

        $this->validate($request, [
            'phone' => 'required|digits_between:9,11|unique:suppliers',
        ]);

        $supplier->name = $request->name;
        $supplier->address1 = $request->address1;
        $supplier->phone = $request->phone;
        $supplier->code= $request->code;


        $supplier->save();

        Session::flash('created_message', 'The new supplier has been added');

        return redirect('/bowner/supplier');*/
        $this->validate($request, [
            'name' => 'required|max:255',
            'address1' => 'max:255',

            'phone' => 'max:255',
            'code' => 'max:255',

            /*            'pricebook_id' => 'max:255',*/
        ]);
        $input = $request->only('name',
            'address1', 'phone', 'code','state'
            );
        $result = Supplier::create($input);
        return redirect()->route('Suppliers.index')
            ->with('success', 'Customer created successfully');
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
        $supplier = Supplier::findOrFail($id);

        return view('Suppliers.edit', compact('supplier'));
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
        $supplier = Supplier::findOrFail($request->id);

        $this->validate($request, [
            'phone' => 'required',
        ]);

        $supplier->name = $request->name;
        $supplier->address1 = $request->address1;
        $supplier->phone = $request->phone;
        $supplier->code= $request->code;
        $supplier->state= 1;

        $supplier->save();

        Session::flash('success', 'The new supplier has been updated');

      //  return redirect('Suppliers.index');
      $response = array(
        'status' => 'success',
        'msg' => 'The new supplier has been updated',
    );
   return response()->json($response);
    //return redirect()->action('SupplierController@index');

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
      /*  $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        Session::flash('deleted_message', 'The supplier has been deleted');

        return redirect('/bowner/supplier');*/
        //Supplier::find($id)->delete();
        $supplier = Supplier::findOrFail($id);

        $supplier->state= 2;
        $supplier->save();

        return redirect()->route('Suppliers.index')
            ->with('success', 'supplier deleted successfully');
    }
}
