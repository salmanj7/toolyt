<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where(function ($query) {
            $query->where('status', 1)
                ->orWhere(function ($query) {
                    $query->where(function ($query) {
                        $query->where('km', '<', 0)
                            ->orWhere('km', '>', 200);
                    })->where('role', 1);
                });
        })->where('age', '>', 20)->get();

        return $this->successResponse('User data retrieved successfully',UserResource::collection($users));
        
    }
}
