<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Contact</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style>
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>
</head>

<body>
    <div class="row">
        <section class="h-100 gradient-form" style="background-color: #2c2828;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-10">
                        <div class="card rounded-3 text-black" style="background-color: #ddd">
                            <div class="row g-0" style="margin: auto; width:1000px;">
                                <div class="col-lg-12" >
                                    <div class="card-body">



                                        <form action="{{ url('contact/store') }}" method="POST">
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
                                                    class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                    type="submit">Create</button>
                                            </div>


                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </div>
</body>

</html>
