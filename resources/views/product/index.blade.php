@include('navigation')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="style.css" type="text/css" rel="stylesheet">
    <link href="sweetalert.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="sweetalert.min.js" type="text/javascript"></script>
    <script type='text/javascript'>
        $(document).ready(function() {

            // Message
            $("#but1").click(function() {
                var message = $("#message").val();
                if (message == "") {
                    message = "Your message";
                }
                swal(message);
            });
        });
    </script>
    <title>Product Management</title>
</head>

<body>
    @if ($success = \Session::get('success'))
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif
    <form action="{{ url('create-product') }}" method="post">
        @csrf
        @method('post')
        <div class="container mt-5">
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Entery Product name" />
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

    <div class="container mt-5">
        <table class="table table-dark">

            <tr>
                <th>product Name</th>
                <th>Category Id</th>
                <th>Action</th>
            </tr>

            @foreach ($product as $product)
                <tr>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['category_id'] }}</td>

                    <td>
                        <a href="{{ url('product-edit', $product->id) }}" class="btn btn-info btn-sm">EDIT</a>
                        <a href="{{ url('delete-product', $product->id) }}" class="btn btn-danger btn-sm">DELETE</a>
                    </td>

                </tr>
            @endforeach

        </table>
</body>


</html>