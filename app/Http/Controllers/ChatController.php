<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ChatMessageEvent ;
use App\Events\Message ; 

use App\Models\chat ;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('chat.index') ;
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
   
    //
        public function store(Request $request)
    {
        //
        
            
            if(Auth::user()){
                event(
                    new Message(
                        $request->input('username'),
                        $request->input('message')
                        )
                    ) ;
                    $chats = new chat() ;
                $chats->Nom_sender =  Auth::user()->name;
                $chats->message =  $request->input('message') ;
                $chats->save() ;
                return ["success" => true] ;
            }
            else{
                return redirect('login/client')->with('pasDechat' ,"Vous ne pouvez pas commancer la communication avant d'étre connecté")
               ;
            }
          
          
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