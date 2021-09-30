<form action="{{ route('relationships.store') }}" method="post">
    @csrf
    <input type="hidden" name="followed_id" value="{{$user->id}}">
    <input type="submit" value="Follow" style="width: 100%">
</form>
