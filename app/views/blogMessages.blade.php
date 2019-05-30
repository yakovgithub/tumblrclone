@extends('layout')

@section('title', 'Messages')

@section('content')
 @include('partials.menu')
<div class="main container" >
 
  <section class="content clearfix" >
    <div class="newsfeed" >
      @foreach($messages as $message)
      <?php $sender = $message->sender; ?>
      <div class="feed clearfix" >
        <div class="avatar no-nip" >
          <a href="http://{{$sender->name}}.tumblrclone.net" >
            <img src="{{asset(json_decode($sender->config)->picture)}}" class="dp" >
          </a >
        </div >
        <div class="fanmail" >

          <p > {{$message->message}} </p >
          <span class="author" > {{$sender->name}} </span >

          <div class="footer" >
            <span class="sentto" > Sent by {{$sender->name}} </span >

            <div class="options" >
              <div id="reply" data-sender="{{$sender->name}}" style="cursor: pointer;display: inline" data-toggle="modal" data-target="#fanmailreply"> <i class="fas fa-share" ></i> </div>
              <a href="{{URL::route('deletemessage', array('id' => $message->id))}}" > <i class="fas fa-trash-alt" ></i > </a >
            </div >
          </div >
        </div >
      </div >
      @endforeach
    </div >
    <aside class="sidebar" >
      <div class="blue block btn" data-toggle="modal" data-target="#fanmail" >
        Send Fan Mail
      </div >
      <ul class="nav nav-pills nav-stacked navigation" >
        <li ><a href="{{URL::route('messages')}}" > All Messages </a ></li >
        @foreach($blogs as $blog)
        <li @if($userblog->name == $blog->name) {{'class="active"'}} @endif ><a href="{{URL::route('blogmessages', array('name' => $blog->name))}}" >{{json_decode($blog->config)->title}} <span >{{$blog->receivedMessages->count()}}</span ></a ></li >
        @endforeach
      </ul >
    </aside >
  </section >

</div >

<div class="modal fade" id="fanmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog" >
    <div class="fanmail modal-content" >

      <form id="message_form" class="compose" method="post" action="{{URL::to('message/send')}}" >
        <div class="sendto" >
          To <br >
          <input id="reciever" name="receiver" type="text" required />
        </div >
        <textarea id="message" name="message" class="mono" placeholder="Message" required ></textarea >

        <div class="sentby" >
          By
          <!--          <input name="sender" type="text" class="author" />-->
          <select name="sender" class="author">
            @foreach($blogs as $blog)
            <option value="{{$blog->name}}" @if($userblog->name == $blog->name) {{'selected'}} @endif >{{$blog->name}}</option >
            @endforeach
          </select >
        </div >
      </form >
      <div class="pull-right footer" >
        <button type="button" class="blue btn" onclick="message_form()" >Send</button >
        <button type="button" class="black btn" data-dismiss="modal" >Cancel</button >
      </div >
    </div >
  </div >
</div >
<div class="modal fade" id="fanmailreply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" >
        <div class="fanmail modal-content" >

            <form id="reply_form" class="compose" method="post" action="{{URL::to('message/send')}}" >
                <div class="sendto" >
                    To <br >
                    <strong><p id="totext"></p></strong>
                    <input id="tovalue" name="receiver" type="hidden" value="" />
                </div >
                <textarea id="reply_message" name="message" class="mono" placeholder="Message" ></textarea >

                <div class="sentby" >
                    By
                    <!--          <input name="sender" type="text" class="author" />-->
                    <select name="sender" class="author">
                        @foreach($blogs as $blog)
                        <option value="{{$blog->name}}" >{{$blog->name}}</option >
                        @endforeach
                    </select >
                </div >
            </form >
            <div class="pull-right footer" >
                <button type="button" class="blue btn" onclick="reply_form()" >Send</button >
                <button type="button" class="black btn" data-dismiss="modal" >Cancel</button >
            </div >
        </div >
    </div >
</div >

@stop

@section('page-script')
<script>
    $('#reply').click(function(){
        var sender = $(this).data('sender');
        $('#totext').text(sender);
        $('#tovalue').val(sender);
    });
    function reply_form() {
      // Get first form element
      var form = $('#reply_form');

      // Check if valid using HTML5 checkValidity() builtin function
      if ($('#reply_message').first().val() != "") {
        form.submit();
      } else {
        alert('All fields are reuqired');
      }
      return false;
    };

    function message_form()
    {
      var form = $('#message_form');

      // Check if valid using HTML5 checkValidity() builtin function
      if ($('#message').first().val() != "" && $('#reciever').first().val() != "") {
        form.submit();
      } else {
        alert('All fields are reuqired');
      }
      return false;
    }

</script>
@stop