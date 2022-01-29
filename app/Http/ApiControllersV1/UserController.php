<?php

namespace App\Http\ApiControllersV1;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(UserRegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $token = $user->createToken('my-app-token')->plainTextToken;
        $response = new UserResource($user, $token);

        return json_success($response, Response::HTTP_OK);
    }

    /**
     * Login user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        // print_r($data);
        if (!$user || ! Hash::check($request->password, $user->password)) {
            return json_success([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = new UserResource($user, $token);

        return json_success($response, 201);
    }

    /**
     * Display the profile of current user.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return json_success(new UserResource(auth()->user()));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        auth()->user()->update($request->only('name'));

        return json_success(new UserResource(auth()->user()));
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return json_success('Logged out!');
    }

    public function logoutAll(Request $request)
    {
        $request->user()->tokens()->delete();

        return json_success('Logged out!');
    }


    public function visitor()
    {
        return json_success('Login please');
    }
}
