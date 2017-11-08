<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;

class AdverController extends Controller
{
    //
    public function index(){
    	$advertisement = Advertisement::paginate(20);
    	return view('staff.advertisement',compact('advertisement'));
    }

    public function show($advertisement_id)
    {
    	$advertisement = Advertisement::find($advertisement_id);
    	return response()->json($advertisement);	
    }

    public function create(Request $request)
    {
    	$advertisement = Advertisement::create($request->input());
    	return response()->json($advertisement);
    }

    public function update(Request $request,$advertisement_id)
    {
        $advertisement = Advertisement::find($advertisement_id);
        $advertisement->advertisement_name = $request->advertisement_name;
        $advertisement->advertisement_img = $request->advertisement_img;
    
        $advertisement->save();
        return response()->json($advertisement);
    }

        public function destroy($advertisement_id)
    {
        $advertisement = Advertisement::destroy($advertisement_id);
        return response()->json($advertisement);
    }
}
