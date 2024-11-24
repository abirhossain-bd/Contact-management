<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact-List</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body style="background-color:#2c2828">
    @include('messages')
    <div class="container mt-3 ">
        <div class="row">
            <div class="col-6">
                <div class=" mb-2">
                    <a href="{{ route('home') }}" class="btn btn-success">Home</a>
                    <a href="{{ route('contact.create') }}" class="btn btn-primary">Add Contact</a>


                </div>
            </div>
            <div class="col-6">
                <form action="{{ route('contact.list') }}">
                    <div class="row">
                        <div class="col-8">
                            <input type="text" name="search" class="form-control" placeholder="Search here.."
                                value="{{ $search }}">
                        </div>
                        <div class="col-4 " style="padding-left:10px">
                            <button type="submit" class="btn btn-primary form-control">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->mobile }}</td>
                            <td>
                                <a href="{{ route('send.otp', $user->id) }}" class="btn btn-success" href="">Send
                                    Otp</a>
                                <a href="{{ route('contact.show', $user->id) }}" class="btn btn-success"
                                    href="">Show</a>
                                <a href="{{ route('contact.edit', $user->id) }}" class="btn btn-primary"
                                    href="">Edit</a>
                                <a href="{{ route('contact.delete', $user->id) }}" class="btn btn-danger"
                                    href="">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <div class="container mt-5 ">
        <div class="mb-2">
            <a href="#" class="btn btn-primary call_ajax">Show Products</a>
        </div>
        <div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Thumbnail</th>
                    </tr>
                </thead>
                <tbody id="product_body">

                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        $(document).on('click','.call_ajax', function(){

            $.ajax({
                url: 'https://dummyjson.com/products',
                type: "GET",

                success: function(responce) {
                    console.log(responce);
                    var products = responce.products;
                    for (let i = 0; i < products.length; i++) {
                        var html = '<tr>' +
                                        '<td>' + products[i].title + '</td>' +
                                        '<td>' + products[i].description + '</td>' +
                                        '<td>' + products[i].brand + '</td>' +
                                        '<td>' + products[i].category + '</td>' +
                                        '<td>' + products[i].price + '</td>' +
                                        '<td><img src="' + products[i].thumbnail + '" height="100" widht="100"></td>' +
                                    '</tr>';
                        $('#product_body').append(html);
                    }

                },
                error: function(error) {
                    console.log(error);
                }
            })
        })
    </script>
</body>

</html>
