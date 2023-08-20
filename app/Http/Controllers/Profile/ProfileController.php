<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController
{
    public function update(Request $request)
    {
        $user = User::where('id', $request->id)->update($this->validation($request));

        if (!$user) abort('401', 'Date invalid');

        return response()->json(['Successfully in update user']);
    }

    private function validation($request)
    {
        $data = [];
        if ($request->name)
            $data['name'] = $request->name ? $request->name : '';

        if ($request->email)
            $data['email'] = $request->email ? $request->email : '';

        if ($request->password)
            $data['password'] = $request->password ? Hash::make($request->password) : '';

        return $data;
    }
}
