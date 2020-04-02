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

use App\Http\Resources\ConversationResource;
use App\Http\Resources\MessageResource;
use App\Http\Resources\UserResource;
use http\Env\Response;
use Illuminate\Http\Request;
use App\User;
use App\Conversation;
use App\Message;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    /**
     * Authenticate an user, returns an api token for further access to the API.
     * @param Request $request
     * @return mixed
     */
    public function auth(Request $request){

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){

            $usr = User::where('email', $credentials['email'])->get();

            return \response($usr);

        } else{
            return \response("UNAUTHORIZED: Invalid credentials",401);
        }
    }


    /**
     * Display a listing of the resource.
     * Display Users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return \response(UserResource::collection(User::all()));

    }

    /**
     * Store a newly created resource in storage.
     * Store a new chat (conversation).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $api_token = $request->get('api_token');
        $usr = User::where('api_token',$api_token)->first();

        if($usr == null){
            return \response('Resource not found',404);
        }

        // TODO: Validation
        $conversation = new Conversation;
        $conversation->user_one_id = $usr->id;
        $conversation->user_two_id = $request->get('to');

        $conversation->save();

        return \response(new ConversationResource($conversation));
    }

    /**
     * Display the specified resource.
     * Display an user (validated by api token) conversations and messages.
     * @param  String api_token
     * @return \Illuminate\Http\Response
     */
    public function show($api_token)
    {
        echo 'show';
        $usr = User::where('api_token',$api_token)->first();
        if($usr !== null){
            return \response(ConversationResource::collection($usr->conversations));
        } else {
            return \response('Resource not found.', 404);
        }


    }

    /**
     * Update the specified resource in storage.
     * Add a new message to a conversation.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $api_token
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $api_token)
    {
        // Auth
        $usr = User::where('api_token',$api_token)->first();
        if($usr == null){
            return \response('Resource not found',404);
        }

        // TODO: Validation
        $message = new Message($request->only('conversation_id','content','loc_longitude','loc_latitude','loc_error'));
        $message->user_id = $usr->id;
        $message->save();
        \response( new MessageResource($message));
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
