<ul class="list-group">
    @foreach ($articles as $article)
    <li class="list-group-item">
        <span>{{$article->title}}</span><br>
        <span>{{$article->content}}</span><br>
        <span>{{$article->created_at}}</span><br>
        <button data-toggle="modal" data-target="#confirmModal">{{ __('message.delete') }}</button>
        <button><a href="{{ route('articles.show', $article) }}">{{ __('message.show') }}</a></button>
    </li>
    @endforeach
</ul>

@if (isset($article))
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="{{ route('articles.destroy', $article) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary">Ok</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
