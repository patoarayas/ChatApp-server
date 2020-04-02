<?php
/**
 * Copyright (c) Patricio Araya  2020.
 *
 *     This program is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 *
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use http\Env\Response;
use Illuminate\Http\Request;
use App\User;
use App\Conversation;
use App\Message;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // TODO: add resources, define function of every method,

    /**
     * @param Request $request
     * @return mixed
     */
    public function auth(Request $request){

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){

            $usr = User::where('email', $credentials['email'])->get();

            return \response($usr);

        } else{
            return \response("Invalid credentials",420);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'index';
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo 'store';
    }

    /**
     * Display the specified resource.
     *
     * @param  String api_token
     * @return \Illuminate\Http\Response
     */
    public function show($api_token)
    {
        echo 'show';
        $usr = User::where('api_token',$api_token)->first();
        if($usr !== null){
            return \response(new UserResource($usr));
        } else {
            return \response('Resource not found.', 404);
        }


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
        echo 'update';
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
        echo 'destroy';
        //
    }
}
