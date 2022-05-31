<!-- HTML::style('public/css/style.css'); -->

<!--extend layout master.blade.php -->

<div class=''>
 
   <!-- @extends('layouts/master') -->
   
   <!--sets value for section title to 'Mini Twitter' (section title is used in messages.blade.php) -->
   @section('title', 'Mini Twitter')
   
   <!--starts section content, defines some html for section content and end section content
   ts value for section title to 'Mini Twitter' (section content is used in messages.blade.php) -->

   @section('content')

   <div class='new_message'>
      
      <h2>New message: </h2>

      <form action='/' method='post'>
         <div>
            <input type='text' name='title' placeholder='Title'>
         </div>
         <div>
            <input type='text' name='subject' placeholder='Hashtag'>
         <div>
         <div>
            <textarea row='4' name='content' placeholder='Content'></textarea>
         <div>
         <!-- this blade directive is necessary for all form posts somewhere in between
            the form tags -->
         @csrf
         <button type='submit'>Submit</button><hr>

      </form>

   </div>

   <!-- validation warning -->

   @if ($errors->any()) 
         <div>
            <ul>
               @foreach ($errors->all() as $error)
                  <li class='warning'>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
   @endif

   <h2>Recent messages:</h2>

   <ul class='list'>
   <!-- loops through the $messages, that this blade template
      gets from MessageController.php. for each element of the loop which
      we call $message we print the properties (title, content
      and created_at in an <li> element -->
   @foreach ($messages as $message) 
      <li>
      <b>
         <!-- this link to the message details is created dynamicallyand will point to /messages/1 for the first message -->
         <a href='/update/{{$message->id}}'>{{$message->title}}:</a>
      </b><br>
         {{$message->subject}}<br>
         {{$message->content}}<br>
         {{$message->created_at->diffForHumans()}}          
      </li>
   @endforeach
   </ul>
   </div>
   @endsection


