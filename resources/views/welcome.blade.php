@extends('layouts.app')
@section('content')


<h1>Send your message</h1>
<p>An entry will appear in the database. You will get a copy and so will the administrators.</p>
<form method="POST" action="{{url('/')}}/sendmessage">
{{ csrf_field() }}
  <div class="form-group">
    <label for="inputName">Name</label>
    <input type="text" class="form-control" id="inputName" name="name" aria-describedby="nameHelp" placeholder="Enter name" required>
  </div>
  <div class="form-group">
    <label for="inputEmail">Email address</label>
    <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
  </div>
  <div class="form-group">
    <label for="inputSubject">Subject</label>
    <input type="subject" class="form-control" id="inputSubject" name="subject" placeholder="Subject" required>
  </div>
  <div class="form-group">
    <label for="inputMessage">Message</label>
    <textarea rows="10" class="form-control" id="inputMessage" name="message" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Send</button>
</form>
@endsection
