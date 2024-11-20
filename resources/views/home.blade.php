<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>
<body>
    @include('messages')
    <div class="container">
        <h1>Welcome {{ $user->first_name . ' '. $user->last_name }} to dashboard</h1>
        <div class="card" style="width:400px">
            <img class="card-img-top" src="{{ ($user->image) ? asset($user->image) : asset('default/demotestimonial.png') }}" alt="Card image" style="width:100%">
            <div class="card-body">
              <h4 class="card-title"><b>Name: {{ $user->first_name . ' '. $user->last_name }}</b></h4>
              <p class="card-text"><b>Interested In:</b> {{ $user->hoby }}</p>
              <p class="card-text"><b>Email:</b> {{ $user->email }}</p>
              <p class="card-text"><b>Mobile:</b> {{ $user->mobile }}</p>
              <a href="{{ route('contact.create') }}" class="btn btn-primary">Add Contact</a>
              <a href="{{ route('contact.list') }}" class="btn btn-success">See Contact</a>
              <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </div>
          </div>

    </div>
</body>
</html>
