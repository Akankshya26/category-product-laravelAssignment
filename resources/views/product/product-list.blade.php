<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
@include('navbar')

<body>
    <div class="row">
        @foreach ($products as $product)
            <div class="col mt-5">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('public/images/' . $product->img[0]->image_name) }}"
                        width="70" alt="Card image cap" style="height: 250px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product['name'] }}</h5>

                        <a href="{{ url('image/' . $product->id) }} " class="btn btn-primary">view</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
