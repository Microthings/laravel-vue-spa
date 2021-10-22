<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Get authenticated user.
     */
    public function current(Request $request)
    {
        return response()->json($request->user());
    }

    public function userPaginate(Request $request)
    {
        $sortAvailable = array(
            'name|asc',
            'name|desc',
        );

        $sortParams = $request->input('sort');
        $filterParams = $request->input('filter');

        if (isset($sortParams) && in_array($sortParams, $sortAvailable)){
            $sortKey = explode('|', $sortParams)[0];
            $sortValue = explode('|', $sortParams)[1];
        }else{
            $sortKey = 'name';
            $sortValue = 'asc';
        }

        if (isset($filterParams)){
            $data = User::select('*')
                ->orWhere('username', 'ilike', "%$filterParams%")
                ->orWhere('name', 'ilike', "%$filterParams%")
                ->paginate();
        }else{
            $data = User::orderBy($sortKey, $sortValue)->paginate(20);
        }

        return  $data;
    }
}
