@include('navigation')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Product Management</title>
</head>

<body>
    @if ($success = \Session::get('success'))
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif
    <form action="{{ url('product-update') }}" method="post">
        @csrf
        {{ method_field('put') }}
        <div class="container mt-5">
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Entery Product name"
                    value="{{ $product->name }}" />
            </div>
            <div class="mb-3">
                <input type="text" name="Price" class="form-control" placeholder="Entery Product price"
                    value="{{ $product->Price }}" />
            </div>
            <div class="mb-3">
                <input type="text" name="description" class="form-control" placeholder="Entery Product description"
                    value="{{ $product->description }}" />
            </div>
            <label for="category_name" class="form-label">Category Name</label>
            <select class="form-control" name="category_name" id="category_name">
                <option>Category Name</option>
                @foreach ($category as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>

</html>
@include('footer')
