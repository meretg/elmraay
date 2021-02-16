<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      //  $items = Item::all();
        $items = Item::where('state', 1)
                       ->orderBy('id')
                       ->get();
        return view('Items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('bowner.Item.create');
        $items = Item::all();
        return view('Items.create', compact('items'));

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
        /*$Item = new Item();

        $this->validate($request, [
            'phone' => 'required|digits_between:9,11|unique:Items',
        ]);

        $Item->name = $request->name;
        $Item->address1 = $request->address1;
        $Item->phone = $request->phone;
        $Item->code= $request->code;


        $Item->save();

        Session::flash('created_message', 'The new Item has been added');

        return redirect('/bowner/Item');*/
        $this->validate($request, [
            'name' => 'required|max:255',
            'quantity' => 'max:255',


            /*            'pricebook_id' => 'max:255',*/
        ]);
        $input = $request->only('name',
            'quantity','state'
            );
            $items = Item::where('state', 1)
                           ->orderBy('id')
                           ->get();
        $result = Item::create($input);
        return redirect()->route('Items.index')


            ->with(array('success'=>'item created successfully','items'=>$items));
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
        $item = Item::findOrFail($id);
        return view('Items.edit', compact('item'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  /*  public function update(Request $request, $id)
    {
        //
        $Item = Item::findOrFail($id);



        $Item->name = $request->name;
        $Item->quantity = $request->quantity;


        $Item->save();

        Session::flash('update_message', 'The new Item has been updated');

        return redirect('/bowner/Item');
    }*/
    public function update(Request $request)
    {
        //
        $item = Item::findOrFail($request->id);




                $item->name = $request->name;
                $item->quantity = $request->quantity;
                $item->state =1;


                $item->save();

        Session::flash('update_message', 'The new item has been updated');

      //  return redirect('Suppliers.index');
      $response = array(
        'status' => 'success',
        'msg' => 'The new item has been updated',
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
      /*  $Item = Item::findOrFail($id);

        $Item->delete();

        Session::flash('deleted_message', 'The Item has been deleted');

        return redirect('/bowner/Item');*/
    //    Item::find($id)->delete();
        $item = Item::findOrFail($id);

        $item->state= 2;
        $item->save();
        return redirect()->route('Items.index')
            ->with('success', 'Item deleted successfully');
    }
}
