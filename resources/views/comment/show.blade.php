<li class="list-group-item">
    <span><a href="{{ route('users.show', $comment->user) }}">{{$comment->user->email}}</a></span><br>
    <span>{{$comment->content}}</span><br>
    <span>{{$comment->created_at}}</span><br>
    @can('update', $comment)
        <a href="{{route('comments.edit', [$comment, $id])}}">edit</a>
        <form action="{{route('comments.destroy', $comment)}}" method="post">
            @csrf
            @method('delete')
            <input type="hidden" name="article_id" value="{{$id}}">
            <input type="submit" value="delete">
        </form>
    @endcan
</li>
