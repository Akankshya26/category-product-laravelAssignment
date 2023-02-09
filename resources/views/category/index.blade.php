@include('navigation')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Catagory Management</title>
</head>

<body>
    @if ($success = \Session::get('success'))
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif
    <form action="{{ url('create-category') }}" method="post">
        @csrf
        @method('post')
        <div class="container mt-5">
            <div class="mb-3">
                <input type="text" name="name" class="form-control" placeholder="Enter Catagory name" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>
<div class="container mt-5">
    <table class="table table-dark">

        <tr>
            <th>Catagory Name</th>
            <th>Action</th>
        </tr>
        @foreach ($category as $category)
            <tr>
                <td>{{ $category['name'] }}</td>
                <td>
                    <a href="{{ url('category-edit', $category->id) }}" class="btn btn-info btn-sm">EDIT</a>
                    <a href="{{ url('delete-category', $category->id) }}" class="btn btn-danger btn-sm">DELETE</a>
                </td>
            </tr>
        @endforeach

</html>
@include('footer')
