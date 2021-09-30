@error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
<form action="{{ route('articles.store') }}" method="post">
    @csrf
    <table>
        <tr>
        <td><label for="category">{{ __('message.article.create.category') }}</label></td>
            <td>
                <select name="category_id" id="">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="title">{{ __('message.article.create.title') }}</label></td>
            <td><input type="text" name="title" id="title" value="{{old('title')}}"></td>
        </tr>
        <tr>
            <td><label for="content">{{ __('message.article.create.content') }}</label></td>
            <td><input type="text" name="content" id="content" value="{{old('content')}}"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="{{ __('message.article.create.submit') }}"></td>
        </tr>
    </table>
</form>
