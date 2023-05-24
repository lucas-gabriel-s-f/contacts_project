<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Create Contacts</title>

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

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
                <form method="POST" action="/contacts/create" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="Name" class="form-control">
                        </div>
                        <div class="form-group">
                        <label>Contact</label>
                        <input type="number" name="Contact" class="form-control">
                        </div>
                        <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="Email" class="form-control">
                        </div>  
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                  
                </form>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/app.js')}}" ></script>
    </body>
</html>
