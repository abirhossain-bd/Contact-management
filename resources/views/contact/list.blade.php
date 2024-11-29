<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}" />

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
                <tbody id="list_id">


                </tbody>
            </table>
            {{ $users->appends(['search' => request('search')])->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <div class="container mt-5 ">
        <div class="mb-2">
            <a href="#" class="btn btn-primary call_ajax">Show Products</a>
            <a href="#" class="btn btn-info call_ajax_post">Ajax Call Post</a>
            <a href="#" class="btn btn-secondary " data-toggle="modal" data-target="#create_contact_modal">Add
                Contact by Ajax</a>
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
    <!-- The Modal -->
    <div class="modal" id="create_contact_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header justify-content-between">
                    <h4 class="modal-title">Create Contact</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" id="contact_create_form">
                        @csrf

                        <p>Please Create your contact</p>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example11">First Name</label>
                            <input name="first_name" type="text" class="form-control"
                                placeholder="Enter First Name..." />
                            @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example11">Last Name</label>
                            <input name="last_name" type="text" class="form-control"
                                placeholder="Enter Last Name..." />
                            @error('last_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example11">Email</label>
                            <input name="email" type="email" class="form-control"
                                placeholder="Enter your email.." />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="form2Example22">Mobile No.</label>
                            <input name="mobile" type="number" class="form-control"
                                placeholder="Enter mobile no " />
                            @error('mobile')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="text-center pt-1 mb-5 pb-1">
                            <button data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" id="create_contact"
                                type="button">Create</button>
                        </div>


                    </form>
                </div>


            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            }
        });


        // Data create start by ajax

        $(document).on('click', '#create_contact', function() {
            var formData = $('#contact_create_form').serialize();
            $.ajax({
                url: "{{ route('contact.store') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    contactList()
                    $('#create_contact_modal').modal('hide');
                },
                error: function(error){
                    console.log(error);

                }
            })
        })

        // Data create end by ajax


        // Data update start by ajax
        




        // Data listing start by ajax
        contactList()
        function contactList(){
            $.ajax({
                url: "{{ route('contact.list') }}",
                type: "get",
                success: function(response) {
                    $('#list_id').html(response);
                },
                error: function(error){
                    console.log(error);

                }
            })
        }

        // Data listing end by ajax



        // Data destroy start by ajax
        $(document).on('click','.contact_destroy', function(){
            var id = $(this).data('id');
            $.ajax({
                url:"{{ route('contact.destroy') }}",
                type: "GET",
                data:{id},
                success:function(response){
                    contactList()
                },
                error: function(error){
                    console.log(error);

                }
            })
        })

        // Data destroy end by ajax





        $(document).on('click', '.call_ajax_post', function() {
            var u_id = 4;
            var url = "testurl";
            $.ajax({
                url: "{{ route('ajax.post') }}",
                type: "POST",
                data: {
                    u_id: u_id,
                    url: url
                },
                success: function(response) {
                    console.log(response, response.message);

                },
                error: function(error) {

                }
            })
        })

        $(document).on('click', '.call_ajax', function() {

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
                            '<td><img src="' + products[i].thumbnail +
                            '" height="100" widht="100"></td>' +
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
