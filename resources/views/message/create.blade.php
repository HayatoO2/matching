@extends('layouts.app')

@section('content')

<div class="message-box">
  <div id="message-inner">
@foreach($messages as $message)

<?php if ($message->to_fav === $profile->id):  ?>
<div> {{$user->profile->nickname}} </div>
<?php endif ?>
<?php if ($message->from_fav === $profile->id):  ?>
<div> {{$profile->nickname}} </div>
<?php endif ?>
<div> {{$message->created_at}}</div>
<div class="arrow_box"> {{$message->message}} </div>

@endforeach
</div>
</div>


<form class="message-form" method="POST" action="{{ route('message.store')}}">
@csrf
  <div class="mb-3">
  <textarea class="message-text form-control" name="message"></textarea>
  <input type="submit" value="送信する" class="message-send">
  <input type="hidden" value=" {{$profile->id}} " name="to_fav">
</div>
</form>
<script src="{{ asset('/js/message.js') }}"></script>
@endsection 