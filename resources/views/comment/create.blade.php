<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create comment</title>
</head>
<body>
    <form action="{{ route('comments.store') }}" method="post">
        @csrf
        <input type="hidden" name="article_id" value="{{$id}}">
        <table>
            <tr>
                <td><label for="content">Nhap noi dung</label></td>
                <td><input type="text" name="content" id="content"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Comment"></td>
            </tr>
        </table>
    </form>
</body>
</html>
