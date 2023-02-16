@include('navigation')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Category Management</title>
</head>

<body>
    {{-- Redirection message --}}
    @if ($success = \Session::get('success'))
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif
    {{-- category edit form --}}
    <form action="{{ url('category-update', $category->id) }}" method="post">
        @csrf
        {{-- {{ method_field('put') }} --}}
        @method('PUT')
        <div class="container mt-5">
            <div class="mb-3">
                <input type="text" name="name" id="name" class="form-control"
                    placeholder="Enter category name" value="{{ $category->name }}" />
            </div>
            <div class="mb-4">
                <input type="file" name="image" class="form-control" id="image"
                    placeholder="Enter Catagory image" value="{{ $category->image }}" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>

</html>
@include('footer')
