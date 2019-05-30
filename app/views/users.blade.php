@extends('layout')

@section('title', 'Dashboard')

@section('content')
@include('partials.menu')
<div class="main container" >



<section class="white content clearfix" >

@if(Session::get('error'))
        <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
        @if(Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif

<table class="table">
<tr>
<th> Name </th>
<th> Email </th>
<th> Actions </th>
</tr>
<?php
  foreach($users as $user)
  {
?>

<tr>
  <td> {{$user->username}} </td>
  <td> {{$user->email}} </td>
  <?php

    $throttle = Sentry::findThrottlerByUserId($user->id);
  

  ?>
  @if($throttle->isBanned())
      <td> Banned </td>
  @else
    <td> <a href="{{URL::to('ban/'.$user->id)}}"> Ban </a> </td>
  @endif
</tr>



<?php
  }
?>
</table>
<?php echo $users->links(); ?>
</section>

</div >


@stop
