<?php

namespace App\Http\Controllers;

use Session;
use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function address(Request $request)
    {

        if($request->isMethod('post')){
            $data = $request->all();
            $this->validate($request, [
                'address' => 'required|string|min:4|max:25',
                'ville' => 'required|string|min:3|max:15',
                'cin' => 'required|min:12|max:12|unique:addresses',
                'telephone' => 'required|min:10|max:10|unique:addresses',
            ]);
            $address = new Address;
            $address->user_id = $data['user_id'];
            $address->user_email = $data['user_email'];
            $address->status = $data['stat'];
            $address->address = $data['address'];
            $address->ville = $data['ville'];
            $address->cin = $data['cin'];
            $address->telephone = $data['telephone'];
            $address->save();
            Session::flash('success','Votre address est bien enregister apres la confirmation dans une minute');
            return redirect()->back();
        }
        $address = Address::all();
        return view('address')->with('address',$address);
    }
}
