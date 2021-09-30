<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sach category</title>
</head>
<body>
    <button><a href="{{ route('categories.create') }}">Create</a></button>
    <table class="table" border="1">
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>#</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$category->name}}</td>
            <td>
                <a href="{{ route('categories.show', $category) }}">Show</a>
                <a href="{{ route('categories.edit', $category) }}">Edit</a>
                <form action="{{ route('categories.destroy', $category) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
