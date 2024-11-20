<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>
<body>
    @include('messages')
    <div class="container">
        <div class="card" style="width:400px">
            <div class="card-body">
              <h4 class="card-title"><b>Name: {{ $contacts->first_name . ' '. $contacts->last_name }}</b></h4>
              <p class="card-text"><b>Interested In:</b> {{ $contacts->hoby }}</p>
              <p class="card-text"><b>Email:</b> {{ $contacts->email }}</p>
              <p class="card-text"><b>Mobile:</b> {{ $contacts->mobile }}</p>
              <a href="{{ route('contact.list') }}" class="btn btn-primary">Back</a>
              <a href="{{ route('contact.delete',$contacts->id) }}" class="btn btn-danger">Delete</a>
            </div>
          </div>

    </div>
</body>
</html>
