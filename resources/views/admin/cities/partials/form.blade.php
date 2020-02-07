<label for="">Название</label>
<input type="text" class="form-control mb-3" name="city" placeholder="Название" value="{{$city->city ?? ''}}">

<label for="">Широта</label>
<input type="number" step="0.0000001" class="form-control mb-3" name="lat" placeholder="Широта" value="{{$city->lat ?? ''}}">

<label for="">Долгота</label>
<input type="number" step="0.0000001" class="form-control mb-3" name="lon" placeholder="Долгота" value="{{$city->lon ?? ''}}">


<input class="btn btn-primary" type="submit" value="Сохранить">