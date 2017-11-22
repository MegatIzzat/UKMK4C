<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notify;


class NotifyController extends Controller
{
    //
    public function refreshNavbar()
    {
        //
        $notify = Notify::get();
        return view('layouts.customer.test',compact('notify'));
    }

    public function isNotified(Request $request, $id)
    {
        //
        Notify::findOrFail($id)->update(['is_seen' => 1]);
        return back();
        return redirect()->back();

    }

    public function isNotifiedAll(Request $request, $id)
    {
        //
        Notify::where('user_id', '=', $id)->update(['is_seen' => 1]);
        return back();
        return redirect()->back();

    }
}
