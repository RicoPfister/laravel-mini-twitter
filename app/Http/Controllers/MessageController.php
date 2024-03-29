<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function showAll() {
 
        // gets all the entries from table messages
        // and gets an array of objects as a return value.
        // we store this return value in the variable $messages
        $message = Message::all()->sortByDesc('created_at');
        $last_updated = Message::all()->sortByDesc('updated_at')->first()['updated_at'];
        // $message->test2='123';
        
        // echo "<pre>";
        // print_r($messages2);
        // echo "</pre>";
 
        // This line would output the messages in the UI/Browser
        // and stop the script execution.
        // good for debugging ;o)
        //dd($messages);
  
        // This function retursn a view.
        // here the blade template engine works its magic again
        // through which we cann pass the $messages array to the view.
        // we can pass it as an optional second paramter (
        // associative array)

        return view('messages', ['messages' => $message, 'last_updated' => $last_updated->diffForHumans()]);
  
    }

    public function create(Request $request) {

        $request->validate([
            'title' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]);
 
        // we create a new Message-Object
        $message = new Message();
        // we set the properties title and content
        // with the values that we got in the post-request
        $message->title = $request->title;
        $message->subject = $request->subject;
        $message->content = $request->content;
   
        // we save the new Message-Object in the messages
        // table in our database
        $message->save();
   
        // at the end we make a redirect to the url /messages
        return redirect('/');        
    }

    public function details($id) {
 
        // ask the database for the message with the ID that we got
        // as a parameter. It is the same ID that we used to
        // generate the links to the message details
        // and the same ID that web.php took out of the link and
        // "passed it on" to the controller   
        $message = Message::findOrFail($id);
        $last_updated = Message::all()->sortByDesc('updated_at')->first()['updated_at'];
       
        // we return the view messageDetails.blade.php
        // and we also pass it the Message-Object that we got
        // back from the function findOrFail   
        return view('messageDetails', ['message' => $message, 'last_updated' => $last_updated->diffForHumans()]);
    }
 
    public function delete($id) {
 
        // ask the database for the message with the ID that we got
        // as a parameter. It is the same ID that we used to
        // generate the links to the message details
        // and the same ID that web.php took out of the link.
        // then we directly call the delete-method of
        // the Message-OBject that we get back from the
        // findOrFail function.
        $result = Message::findOrFail($id)->delete();
  
        // after that we redirect to the message list again  
        return redirect('/');        
    } 

    public function update(Request $request, $id)

    {
        $request->validate([
            'title' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]);

       $data=Message::findOrFail($id);
       $data->title=$request->title;
       $data->subject=$request->subject;
       $data->content=$request->content;
       $data->updated_at = now();
       $data->save();
       
        // after that we redirect to the message list again  
        return redirect('/');         
    }
 
}

?>



