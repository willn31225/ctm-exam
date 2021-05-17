<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailUser;

class EmailUserController extends Controller
{
    public function index()
    {
        return EmailUser::all();
    }

    public function show($id)
    {
        return EmailUser::findOrFail($id);
    }

    public function create(Request $request)
    {
        try {
            EmailUser::create([
                'email' => $request->email,
                'opt_in' => $request->opt_in,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name
            ]);

            return response()->json(['status' => 'success', ['message' => 'Email user created successfully']]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', ['message' => $e->getMessage()]]);
        }
    }

    public function optOut($id)
    {
        $emailUser = EmailUser::findOrFail($id);

        try {
            $emailUser->opt_in = 0;
            $emailUser->save();

            return response()->json(['status' => 'success', 'message' => 'Email User successfully opted out']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
