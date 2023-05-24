<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contacts Panel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    </head>
    <body class="antialiased">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="/">Contacts</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="/contacts/create">Create Contacts</a>
    </li>
    
    </nav>
    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
    @endif
    
<div class="container"> 
<h3 class="mt-3">Contact Details</h3>
    

    <table class="table table-hover mt-5">
    
      <thead>
        <tr>
          <th>Name</th>
          <th>Contact</th>
          <th>Email</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($contacts as $contact)
        <tr>
          <td>{{$contact->Name}}</td>
          <td>{{$contact->Contact}}</td>
          <td>{{$contact->Email}}</td>
          <td>
            <a href="/contacts/{{$contact->id}}/details" class="btn btn-dark">Details</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="text-right">
        <a href="/contacts/create" class="btn btn-dark mt-2">Create Contact</a>
    </div>
</div>



    <script type="text/javascript" src="{{asset('js/app.js')}}" ></script>
    </body>
</html>
