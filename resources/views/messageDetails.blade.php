<div class=''>
   <!--extend layout master.blade.php -->
   <!-- @extends('layouts.master') -->
  
      <!--sets value for section title to "Mini Twitter" (section title is used in messages.blade.php) -->
      @section('title', 'Mini Twitter')
      
      <!--starts section content, defines some html for section content and end section content
      ts value for section title to "Mini Twitter" (section content is used in messages.blade.php) -->

      @section('content')
      <h2>Message Details:</h2>
      <form action="/update/{{$message->id}}" method="post">
      @csrf
      
      <input type="text" name="title" value='{{ $message->title }}'>
      <input type="text" name="subject" value='{{ $message->subject }}'>
      <textarea name="content">{{ $message->content }}</textarea>

      <div class='button_bar'>         

            <!-- @method('update') -->
            <button class="button_change" type="submit">Update message</button>
         </form>

         <form action="/{{$message->id}}" method="post">
            @csrf
            @method('delete')
            <button class="button_delete" type="submit">Delete message</button>
         </form>

      </div>
      </div>
      @endsection


