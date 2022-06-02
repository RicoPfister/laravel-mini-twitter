@extends('layouts.master')

<div class=''>

      @section('content')
      <h2>Message Details:</h2>

      <form action="/update/{{$message->id}}" method="post">
      @csrf
         <input type="text" name="title" value='{{ $message->title }}'>
         <input type="text" name="subject" value='{{ $message->subject }}'>
         <textarea name="content">{{ $message->content }}</textarea>

         <div class='button_bar'>         
           
            <button class="button_change" type="submit">Update message</button>
            </form>

               <form action="/{{$message->id}}" method="post">
                  @csrf
                  @method('delete')
                  <button class="button_delete" type="submit">Delete message</button>
                  </div>
               </form>

      </div>
      @endsection


