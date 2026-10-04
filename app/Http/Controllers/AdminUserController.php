<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    //

    public function search(Request $request)
    {
        $this->authorize('viewAny', \App\Models\User::class);
        $query = $request->input('termo');



        $users = \App\Models\User::where('name', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->get();

        

        return response()->json($users);
    }

    public function fetchById($id)
    {
        $user = \App\Models\User::find($id);
        $this->authorize('read', $user);        

        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = \App\Models\User::find($id);
        $this->authorize('update', $user);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->update($request->all());

        return response()->json($user);
    }

    public function destroy(Request $request, $id)
    {
        $user = \App\Models\User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }


}
