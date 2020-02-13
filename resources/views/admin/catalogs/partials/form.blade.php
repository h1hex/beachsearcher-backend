<h2>Info about catalog</h2>
<label for="">Name</label>
<input type="text" class="form-control mb-3" name="name" value="{{$catalog->name ?? ''}}" placeholder="Name">

<label for="">Label</label>
<input type="text" class="form-control mb-3" name="label" value="{{$catalog->label ?? ''}}" placeholder="Label">

<input class="btn btn-primary" type="submit" value="Save">