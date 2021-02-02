<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'register successfully',
                'data' => $user->toArray()
            ], 200);
        } catch (\Throwable $th) {
            DB::rollback();

            return response()->json([
                'status' => 'failed',
                'message' => 'register failed : ' . $th->getMessage(),
                'data' => null
            ], 400);
        }
    }
}
