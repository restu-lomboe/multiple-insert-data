<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Developer Awam</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href=" {{ route('customer') }} ">Home</a>
                    <a class="nav-item nav-link" href=" {{ route('detail.customer') }} ">Customer</a>
                    <a class="nav-item nav-link" href="#">Contact</a>
                    <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">About</a>
                </div>
            </div>
        </nav>

        <ul class="list-group col-md-4 mt-5">
            @foreach ($customers as $cust)
                <li class="list-group-item justify-content-between align-items-center">
                    {{ $cust->name }}
                    <div class="float-right">
                        <span class="badge badge-primary badge-pill">
                            <a href=" {{ url('/cutomer/detail/' . $cust->id) }} " class="text-white">Detail</a>
                        </span>
                        <span class="badge badge-warning badge-pill">
                            <a href="{{ route('customer.edit', $cust->id) }}" class="text-white">Edit</a>
                        </span>
                    </div>
                </li>
            @endforeach

        </ul>





    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>
