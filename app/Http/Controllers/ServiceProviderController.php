<?php

namespace App\Http\Controllers;

use App\serviceprovider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceProviderController extends Controller
{
    public function getIndex() {
        $sps = serviceprovider::all();
        return view('Administration.serviceProvider.index', ['sps' => $sps]);
    }

    public function getCreate() {
        return view('Administration.serviceProvider.sp_create');
    }

    public function postCreate(Request $request) {
        $validator = Validator::make($request->all(), [
            'fName'=>'required|max:50',
            'lName'=>'required|max:50',
            'email'=>'required|email|max:50|unique:serviceproviders',
            'uName'=>'required|max:50',
            'pNumber'=>'required|max:20',
            'password' => 'required|confirmed|max:20'
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $serviceProvider = new serviceprovider([
            'firstname' => $request->input('fName'),
            'lastname' => $request->input('lName'),
            'email' => $request->input('email'),
            'username' => $request->input('uName'),
            'phone_number' => $request->input('pNumber'),
            'password'=> $request->input('password')
        ]);
        $serviceProvider->save();
        return redirect()->route('sp.index');
    }

    public function getEdit($id) {
        $sp = serviceprovider::find($id);
        return view('Administration.serviceProvider.sp_edit', ['sp' => $sp]);
    }

    public function postEdit(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'fName'=>'required|max:50',
            'lName'=>'required|max:50',
            'email'=>'required|email',
            'pNumber'=>'required|max:10',
        ]);
        if($validator->fails()) {
            return redirect()->route('sp.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        $sp = serviceprovider::find($id);
        $sp->firstname = $request->input('fName');
        $sp->lastname = $request->input('lName');
        $sp->email = $request->input('email');
        $sp->phone_number = $request->input('pNumber');
        $sp->save();
        return redirect()->route('sp.index');
    }

    public function getDelete($id) {
        $sp = serviceprovider::find($id);
        return view('Administration.serviceProvider.sp_delete', ['sp' => $sp]);
    }

    public function postDelete($id) {
        $sp = serviceprovider::find($id);
        $sp->delete();
        return redirect()->route('sp.index');
    }

}