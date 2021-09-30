<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <td><label for="name">Nhập tên chuyên mục</label></td>
                <td><input type="text" name="name" id="name" value="{{old('name')}}"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Them"></td>
            </tr>
        </table>
    </form>
</body>
</html>
