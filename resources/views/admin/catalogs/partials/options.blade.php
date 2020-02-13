<h3 class="mt-3">Add options</h3>
<input type="hidden" name="name" value="{{$catalog->name}}">
<input type="hidden" name="parent_id" value="{{$catalog->id}}">
<input type="text" name="value" class="form-control mb-3" placeholder="Option" required>
<button type="submit" class="btn btn-primary">Add new option</button>