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
    <form action="{{ route('articles.update', $article) }}" method="post">
        @csrf
        @method('put')
        <table>
            <tr>
                <td><label for="title">Nhập tên chuyên mục</label></td>
                <td><input type="text" name="title" id="title" value="{{$article->title}}"></td>
            </tr>
            <tr>
                <td><label for="content">Nhập nội dung</label></td>
                <td><input type="text" name="content" id="content" value="{{$article->content}}"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Them"></td>
            </tr>
        </table>
    </form>
</body>
</html>
