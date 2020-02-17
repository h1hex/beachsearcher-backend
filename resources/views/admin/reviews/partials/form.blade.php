<label for="">Type: </label>
@if($review->type == 1)
        <span class="text-primary font-weight-bold d-block mb-3">Review</span>
@elseif($review->type == 2)
        <span class="text-danger font-weight-bold d-block mb-3">Question</span>
@elseif($review->type == 3)
        <span class="text-dark font-weight-bold d-block mb-3">Story</span>
@endif

<div class="mb-3">Beach: <a href="{{route('admin.beaches.edit', $beach)}}">{{$beach->title}}</a></div>

<div class="mb-3">By: <a href="{{route('admin.users.edit', $user)}}">{{$user->name}}</a></div>

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

@if($review->type == 1)
<label for="">Rating</label>
<input type="number" step="0.1" name="rating" class="form-control mb-3" placeholder="Rating" value="{{$review->rating ?? ''}}">
@endif

<label for="">Text</label>
<textarea name="text" id="" cols="30" rows="10" class="form-control mb-3" placeholder="Review message">{{$review->text ?? ''}}</textarea>

<input class="btn btn-primary" type="submit" value="Сохранить">