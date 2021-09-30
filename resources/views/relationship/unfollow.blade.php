<form action="{{ route('relationships.destroy', $user->id) }}" method="post">
    @csrf
    @method('delete')
    <input type="submit" value="Unfollow" style="width: 100%">
</form>
