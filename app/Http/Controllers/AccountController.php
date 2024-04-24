<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    function accountpanel()
    {
        $user = DB::table("users")->whereRaw("id=?", [Auth::user()->id])->first();
        return view("vidusach.account", compact("user"));
    }
    function saveaccountinfo(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string']
        ]);
        $id = $request->input('id'); //$request->id;
        $data["name"] = $request->input("name");//$request->name;
        $data["phone"] = $request->input("phone");
        $data["email"] = $request->input("email");
        DB::table("users")->where("id", $id)->update($data);
        return redirect()->route('account')->with('status', 'Cập
nhật thành công');
    }
}
