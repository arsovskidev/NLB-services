<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ClientApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = [
            "name" => env('BANK_NAME', false),
            "slug" => env('BANK_SLUG', false),
            "image" => env('APP_URL', false) . env('BANK_IMAGE', false),
            "desc" => env('BANK_DESC', false),

        ];

        return response()->json($info, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function info(Request $request)
    {
        $token = Token::where("token", "=", $request->token)->first();

        if ($token != null) {
            $response = [
                "status" => "success",
                "client" => [
                    "name" => $token->client->name,
                    "surname" => $token->client->surname,
                    "email" =>  $token->client->email,
                    "accounts" => [
                        $token->client->accounts
                    ]
                ],
            ];

            return response()->json($response, 200);
        }
        return response()->json(["status" => "error", "message" => "Invalid token"], 401);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only("email", "password");
        $auth = Auth::guard('client');

        if ($auth instanceof \Illuminate\Contracts\Auth\StatefulGuard) {
            if ($auth->attempt($credentials)) {
                $token = Str::random(32);
                Token::create([
                    'client_id' => $auth->user()->id,
                    'token' => $token,
                    'expires_at' => date('Y-m-d h:i:s', strtotime('+7 day')),
                ]);
                return response()->json(["token" => $token], 200);
            }
        }
        return response()->json(["status" => "error", "message" => "Invalid credentials"], 401);
    }

    public function search($name)
    {
        $client = Client::where("surname", "like", '%' . $name . '%')->get('id');
        return $client;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
