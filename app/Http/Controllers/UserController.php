<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $user =  User::create($data);
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!ctype_digit($id) || $id <= 0) {
            return response()->json(["error" => 400, "message" => "Id not valid"], 400);
        }
        $user = User::find($id);
        if (!$user) {
            return response()->json(["error" => 404, "message" => "User not found"], 404);
        }
        return response()->json($user, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        if (!ctype_digit($id) || $id <= 0) {
            return response()->json(["error" => 400, "message" => "Id not valid"], 400);
        }
        $user = User::find($id);
        if (!$user) {
            return response()->json(["error" => 404, "message" => "User not found"], 404);
        }
        $data = $request->validated();
        $user->update($data);
        return response()->json($user, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!ctype_digit($id) || $id <= 0) {
            return response()->json(["error" => 400, "message" => "Id not valid"], 400);
        }
        $user = User::find($id);
        if (!$user) {
            return response()->json(["error" => 404, "message" => "User not found"], 404);
        }
        $user->delete();
        return response()->json(null, 204);
    }
}
