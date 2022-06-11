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
                    <a class="nav-item nav-link" href="{{ route('detail.customer') }}">Customer</a>
                    <a class="nav-item nav-link" href="#">Contact</a>
                    <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">About</a>
                </div>
            </div>
        </nav>
        <form class="mt-5" action=" {{ route('customer.update', $customer->id) }} " method="POST">
            {{ csrf_field() }}
            <h1>Form Update Data {{ $customer->name }}</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="form-group row mt-5">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{ $customer->name }}"
                        placeholder="Masukan nama kamu" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="emal" class="form-control" name="email" value="{{ $customer->email }}"
                        placeholder="Masukan email kamu" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <a href="javascript:" class="addcustomer btn btn-primary" style="float: right;">Tambah Alamat</a>
                </div>
            </div>

            @foreach ($customer->detail as $detail)
                <div class="mb-5 mt-5">
                    <label class="font-weight-bold">Alamat {{ $loop->iteration }}</label>
                    <hr class="mt-0">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="address[]" value="{{ $detail->address }}"
                                placeholder="Masukan alamat kamu" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">HP/Telp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="phone[]" value="{{ $detail->phone }}"
                                placeholder="Masukan HP/Telp kamu" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kode Pos</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kode_pos[]"
                                value="{{ $detail->kode_pos }}" placeholder="Masukan kode pos kamu" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="javascript:" class="remove btn btn-danger float-right">Hapus</a>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="customer mt-5 mb-5"></div>

            <div class="form-group row mt-5">
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-success form-control" value="Submit">
                </div>
            </div>
        </form>





    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript">
        $('.addcustomer').on('click', function() {
            addcustomer();
        });

        function addcustomer() {
            var customer =
                '<div> <div class="form-group row"><label class="col-sm-2 col-form-label">Alamat</label><div class="col-sm-10"><input type="text" class="form-control" name="address[]" value="{{ old('address') }}" placeholder="Masukan alamat kamu" required></div></div><div class="form-group row"><label class="col-sm-2 col-form-label">HP/Telp</label><div class="col-sm-10"><input type="text" class="form-control" name="phone[]" value="{{ old('phone') }}" placeholder="Masukan HP/Telp kamu" required></div></div><div class="form-group row"><label class="col-sm-2 col-form-label">Kode Pos</label><div class="col-sm-10"><input type="text" class="form-control" name="kode_pos[]" value="{{ old('kode_pos') }}" placeholder="Masukan kode pos kamu" required></div></div><div class="form-group row"><label class="col-sm-2 col-form-label"></label><div class="col-sm-10"><a href="javascript:" class="remove btn btn-danger" style="float: right;">Hapus</a></div></div></div>';
            $('.customer').append(customer);
        };
        $('.remove').live('click', function() {
            $(this).parent().parent().parent().remove();
        });
    </script>


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
