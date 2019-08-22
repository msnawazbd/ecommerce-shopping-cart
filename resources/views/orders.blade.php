<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d7f1d7068d.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">eShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Products <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('orders') }}">Orders <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <div class="my-2 my-lg-0">
                <a href="{{ route('view-cart') }}" class="my-2 my-sm-0"><i class="fas fa-shopping-cart"></i> <sup>{{ Cart::count() }}</sup></a>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="card p-2">
        <div class="row">
            @foreach($orders as $order)
            <div class="col-md-12 mb-5">
                <div class="alert alert-success clearfix" role="alert">
                    <div class="float-left">
                        <h4>{{ $order->user->name }}</h4>
                        <p><strong>Total: {{ $order->order_total }} $</strong></p>
                    </div>
                    <div class="float-right">
                        <p><strong>Date: {{ $order->created_at }}</strong></p>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($order->order_details as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->quantity }}</td>
                            <td>{{ $row->price }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
