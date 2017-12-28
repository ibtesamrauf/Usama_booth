<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Products;
use Cart;

class Show_cart_viewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('show_cart_view', compact('device'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.network.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'cart_product_id'               => 'required',
            'cart_product_quantity'         => 'required|numeric',
        ])->validate();
        v($request->cart_product_quantity);
        $item = Cart::instance('shopping')->get($request->cart_product_id);
        if(!empty($item)){
            Cart::instance('shopping')->update($request->cart_product_id, ['qty' => $request->cart_product_quantity] );
        }
        // Session::flash('flash_message', 'User added!');

        return redirect('show_cart_view');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        vv("show");
        // $user = Network::findOrFail($id);
        return view('admin.network.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        vv("edit");
        // $user = Network::findOrFail($id);
        // Cart::instance('shopping')->remove($id);
        // return view('admin.network.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {   
        vv("update");
        // $this->validate($request, [
        //     'network_name' => 'required',
        // ]);
        // $requestData = $request->all();
    
        // $user = Network::findOrFail($id);
        // $user->update($requestData);

        // Session::flash('flash_message', 'User updated!');

        // return redirect('network');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $item = Cart::instance('shopping')->get($id);
        if(!empty($item)){
            Cart::instance('shopping')->remove($id);
        }
        Session::flash('flash_message', 'User deleted!');

        return back();
    }
}
