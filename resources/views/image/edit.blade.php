@include('navigation')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Image Management</title>
</head>

<body>
    {{-- redirection message --}}
    @if ($success = \Session::get('success'))
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif
    {{-- image edit form --}}
    <form action="{{ url('image-update') }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('put') }}
        <div class="container mt-5">
            <div class="mb-4">
                <input type="file" name="image[]" class="form-control" multiple id="image" />
            </div>
            <div>
                <label for="product_name" class="form-label">Product Name</label>
                <select class="form-control" name="id" id="id">
                    <option>Product Name</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
</body>

<div class="container mt-5">
    <h1>Stored Images</h1>
    <div class="row">

        <td>
            @foreach ($images as $image)
                <div>
                    <img src="{{ asset('public/images/' . $image->image_name) }}"width="200" alt="...">
                </div>
                <br>
            @endforeach
        </td>


    </div>
</div>

</html>
