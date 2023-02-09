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
    @if ($success = \Session::get('success'))
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif
    <form action="{{ url('store-image') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        <div class="container mt-5">
            <div class="mb-4">
                <input type="file" name="image[]" class="form-control" multiple id="image"
                    placeholder="Enter Catagory name" />
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>
<br><br>
<div class="container mt-4">
    <table class="table table-dark">

        <tr>
            <th>product name</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>
                    <a href="{{ url('delete-image', $product->id) }}" class="btn btn-danger btn-sm">DELETE</a>
                    <a href="{{ url('image', $product->id) }}" class="btn btn-info btn-sm">view</a>
                </td>
            </tr>
        @endforeach
    </table>

</html>
@include('footer')
