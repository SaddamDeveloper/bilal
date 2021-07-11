<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function login(Request $request)
    {
        $rules = [
            'username' => ['required', 'string', 'min:3', 'max:255',],
            'password' => ['required', 'string', 'min:8'],
        ];

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->messages()->first(), 400);
        }

        $user = User::where('username',$request->username)->first();

        if (!$user) {
            return response()->json([
                'message' => 'The provided credentials are incorrect.',
            ], 400);
        }

        if (Hash::check($user->password, $request->password)) {
            return response()->json([
                'message' => 'The provided credentials are incorrect.',
            ], 400);
        }

        $token = $user->createToken(
            'wallex-limited',
            [
                'api',
            ]
        )->plainTextToken;

        return response()->json([
            'token' => 'Bearer',
            'access_token' => $token,
        ]);
    }

    public function register(Request $request)
    {
        $rules = [
            'username' => ['required', 'string','unique:users', 'min:3', 'max:255'],
            'email' => ['bail', 'required', 'email:strict', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(["messages"=>$validator->messages()->first()], 400);
        }

        $user = new User();
        $uuid = \Uuid::generate()->string;

        $user->id = $uuid;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->user_limit = 60;

        $user->save();
        return response()->json([
            'message' => 'User created.'
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Successful logout.'
        ]);
    }

}
