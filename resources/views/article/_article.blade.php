<li class="list-group-item">
    <span>{{$article->category->name}}</span><br/>
    <span>{{$article->title}}</span><br/>
    <span>{{$article->content}}</span><br/>
    <span>{{$article->created_at}}</span><br>
    <a href="{{ route('articles.show', $article) }}">Detail</a>
</li>
