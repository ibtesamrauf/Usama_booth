<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use \Input as Input;
use Illuminate\Support\Facades\Input;
use App\Products;

// use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth','isVerified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::paginate(15);
        return view('home' , compact('products'));
    }

    public function add_product_view()
    {
        return view('add_product_view');
    }

    public function add_product(Request $request)
    {
        $image_name = "";
        Validator::make($request->all(), [
            'title'         => 'required',
            'description'   => 'required',
            'price'         => 'required|numeric',
        ])->validate();

        if(Input::hasFile('file')){
            echo 'Uploaded';
            $file = Input::file('file');
            $file->move('uploads', $file->getClientOriginalName());
            echo '';
            $image_name = $file->getClientOriginalName();
        }
        
        Products::insert([
            'user_id'       => \Auth::user()->id, 
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'image'         => $image_name,
        ]);

        return redirect('home')->with('status', 'Product Added!');
    }

}
