<label for="">Review about: {{$beach->title}}</label>
<a href="{{route('admin.beaches.edit', $beach)}}" class="mb-3 d-block">Open beach</a>

<label for="">Review by: {{$user->name}}</label>
<a href="{{route('admin.users.edit', $user)}}" class="mb-3 d-block">Open user</a>

<label for="">Status</label>
<select name="status" class="form-control mb-3">
    @if(isset($review->id))
        <option value="0" @if ($review->status == 0) selected @endif>Archived</option>
        <option value="9" @if ($review->status == 9) selected @endif>In moderation</option>
        <option value="10" @if ($review->status == 10) selected @endif>Published</option>
    @else
        <option value="0">Archived</option>
        <option value="9">In moderation</option>
        <option value="10">Published</option>
    @endif
</select>

<label for="">Rating</label>
<input type="number" step="0.1" name="rating" class="form-control mb-3" placeholder="Rating" value="{{$review->rating ?? ''}}">

<label for="">Text</label>
<textarea name="text" id="" cols="30" rows="10" class="form-control mb-3" placeholder="Review message">{{$review->text ?? ''}}</textarea>

<input class="btn btn-primary" type="submit" value="Сохранить">