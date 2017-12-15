<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;
use Validator;

class AdverController extends Controller
{
    //
    public function index(){
        $advertisement = Advertisement::paginate(10);
        return view('staff.advertisement.index',compact('advertisement'));
    }

    public function create(){
        return view('staff.advertisement.create');
    }

    public function edit($id)
    {
        $adv = Advertisement::findOrfail($id);
        return view('staff.advertisement.edit', compact('adv'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'advertisement_id' => 'required|string',
            'advertisement_name' => 'required|string',
            'advertisement_img' => 'required|string',
            'staff_id' => 'string',
            ])->validate();

        Advertisement::create($request->all());

        return redirect()->route('staff.advertisement.index')->with('success','Advertisement has been created!');
    }

    public function update(Request $request, $id){
        Validator::make($request->all(), [
            'advertisement_id' => 'required|string',
            'advertisement_name' => 'required|string',
            'advertisement_img' => 'required|string',
            'staff_id' => 'string',
            ])->validate();

        Advertisement::findOrFail($id)->update($request->all());
        return redirect()->route('staff.advertisement.index')->with('success','Advertisement has been updated!');
    }

    public function destroy($id){
        if(Advertisement::destroy($id)) {
            return redirect()->route('staff.advertisement.index')->with('success', 'Advertisement has been successfully deleted!');
        } else {
            return redirect()->route('staff.advertisement.index')->with('error', 'Please try again!');
        }
    }
}