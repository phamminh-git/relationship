<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comment</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Content</td>
            <td>#</td>
        </tr>
        @foreach ($comments as $comment)
        <tr>
            <td>{{$comment->content}}</td>
            <td>
                <a href="{{ route('comments.edit', [$comment, $id]) }}">Edit</a>
                <a href="{{ route('comments.show', $comment) }}">Show</a>
                <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                    @csrf
                    @method("delete")
                    <input type="hidden" name="article_id" value="{{$id}}">
                    <input type="submit" value="Xóa">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
