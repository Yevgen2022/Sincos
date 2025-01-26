<?php

namespace App\Http\Controllers\User;

use App\Models\User;

class AdminUserDeleteController
{
    public function destroy($id)
    {
        $user = User::findOrFail($id);


        // Check: Deny administrator removal
        if ($user->role === 'admin') {
            return redirect()->route('admin.user')->with('error', 'You cannot delete an admin user.');
        }


        $user->delete();
        return redirect()->route('admin.user')->with('success', 'User deleted successfully.');
    }

}