<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notify;
use App\Customer;


class NotifyController extends Controller
{
    //
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
