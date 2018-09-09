@extends('layouts.app')
@section('content')


<h1>Messages</h1>
<table class="table striped">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($data as $message)
    <tr>
      <td>{{$message->name}}</td>
      <td>{{$message->email}}</td>
      <td>{{$message->subject}}</td>
      <td>{{$message->message}}</td>
    </tr>
   @endforeach
  </tbody>
</table>

@endsection
