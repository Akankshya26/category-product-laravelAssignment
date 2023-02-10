{{-- logic --}}
{{-- <div class="container mt-5">
        <div class="mb-3">
            <table border=4 colspan=3>
                <th>Images</th>
                <form action="{{ url('image/{id}') }}">
                    <tr>

                        @foreach ($image as $img)
                            <td>
                                <img src="{{ asset('public/images/' . $img->image_name) }}" width=200 hight=150 />
                            </td>
                        @endforeach

                    </tr>

                </form>
            </table>
        </div>
    </div> --}}

@include('navigation')
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Image View</title>
</head>

<body>
    <h1></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="width: 50%; margin: 0 auto;">
        <div class="carousel-inner">
            @foreach ($image as $key => $img)
                @if ($key == 0)
                    <div class="carousel-item active">
                        <img src="{{ asset('public/images/' . $img->image_name) }}" class="d-block w-50" alt="...">
                    </div>
                @else
                    <div class="carousel-item ">
                        <img src="{{ asset('public/images/' . $img->image_name) }}" class="d-block w-50" alt="...">
                    </div>
                @endif
            @endforeach

        </div>
        <div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <br>

        @foreach ($product as $product)
            <tr>Product Name:
                <h1> {{ $product->name }}</h1>
                Price:
                <td>{{ $product->Price }}</td>
            </tr>
        @endforeach
        <div>
            <a href="#" class="btn btn-warning" role="button">Add To cart</a>
            <a href="#" class="btn btn-warning" role="button">Buy Now</a>
        </div>
    </div>

</body>


</html>
@include('footer')
