<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Remove</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach(Cart::content() as $row)
                            <tr>
                                <td><p><strong>{{ $row->name }}</strong></p></td>
                                <td>
                                    <form class="form-inline" action="{{ route('update-cart', $row->rowId) }}" method="post">
                                        @csrf()
                                        <input type="text" name="qty" class="form-control mb-2 mr-sm-2" value="{{ $row->qty }}">
                                        <button type="submit" class="btn btn-primary mb-2 btn-sm"><i class="fas fa-edit"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('remove-cart', $row->rowId) }}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                                <td>${{ $row->price}}</td>
                                <td>${{ $row->total }}</td>
                            </tr>
                        @endforeach
                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td><strong>Subtotal</strong></td>
                            <td>{{ Cart::subtotal() }}</td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td><strong>Tax</strong></td>
                            <td>{{ Cart::tax() }}</td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td><strong>Total</strong></td>
                            <td>{{ Cart::total() }}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <a href="{{ route('destroy-cart') }}" class="btn btn-danger btn-sm float-left"> <i class="fas fa-trash"></i> Clear Cart</a>
                    <a href="{{ route('checkout-cart') }}" class="btn btn-success btn-sm float-right"> <i class="fas fa-arrow-right"></i> Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
