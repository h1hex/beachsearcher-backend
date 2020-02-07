<label for="">Стутус</label>
<select name="status" class="form-control mb-3">
    @if(isset($beach->id))
        <option value="0" @if ($beach->status == 0) selected @endif>Архивирован</option>
        <option value="9" @if ($beach->status == 9) selected @endif>Черновик</option>
        <option value="10" @if ($beach->status == 10) selected @endif>Опубликован</option>
    @else
        <option value="0">Архивирован</option>
        <option value="9">Черновик</option>
        <option value="10">Опубликован</option>
    @endif
</select>

<label for="">Название</label>
<input type="text" class="form-control mb-3" name="title" placeholder="Название" value="{{$beach->title ?? ''}}">

<label for="">Широта</label>
<input type="number" step="0.0000001" name="lat" placeholder="Широта" value="{{$beach->lat ?? ''}}" class="form-control mb-3">

<label for="">Долгота</label>
<input type="number" step="0.0000001" name="lon" placeholder="Долгота" value="{{$beach->lon ?? ''}}" class="form-control mb-3">

<label for="">Изображения</label>
<input type="file" class="form-control-file mb-3" name="pictures[]" multiple>
@isset($beach->pictures)
        <div class="jumbotron mt-2 mb-2" style="max-height: 350px; overflow: auto">
                <h3>Изображения</h3>
                @php
                        $images = unserialize($beach->pictures)
                @endphp
                <div class="d-flex flex-wrap">
                        @if(is_array($images))
                                @foreach($images as $image)
                                        <img class="w-100" src="{{$image}}" alt="">
                                @endforeach
                        @else
                                <img class="w-100" src="{{$images}}" alt="">
                        @endif
                </div>
        </div>
@endif

<label for="">Панорамы</label>
<input type="file" class="form-control-file mb-3" name="panoramas[]" multiple>
@isset($beach->panoramas)
        <div class="jumbotron mt-2 mb-2" style="max-height: 350px; overflow: auto">
                <h3>Панорамы</h3>
                @php
                        $images = unserialize($beach->panoramas)
                @endphp
                <div class="d-flex flex-wrap">
                        @if(is_array($images))
                                @foreach($images as $image)
                                        <img class="w-100" src="{{$image}}" alt="">
                                @endforeach
                        @else
                                <img class="w-100" src="{{$images}}" alt="">
                        @endif
                </div>
        </div>
@endif

<label for="">POI изображение</label>
<input type="file" class="form-control-file mb-3" name="poi_img">
@isset($beach->poi_img)
        <div class="jumbotron mt-2 mb-2" style="max-height: 350px; overflow: auto">
                <h3>POI изображение</h3>
                @php
                        $image = unserialize($beach->poi_img)
                @endphp
                <img src="{{$image}}" alt="" class="w-100">
        </div>
@endif

<label for="">Населенный пункт</label>
<select name="city_id" class="form-control mb-3">
    @foreach($cities as $city)
        @if(isset($beach->city_id) && $city->id == $beach->city_id)
            <option value="{{$city->id}}" selected>{{$city->city}}</option>
        @else
            <option value="{{$city->id}}">{{$city->city}}</option>
        @endif
    @endforeach
</select>
{{--<input type="text" name="city" class="form-control mb-3" value="{{$beach->city ?? ''}}">--}}

<label for="">Краткое описание</label>
<p class="text-secondary"><em>Данный текст динамически генерируется, сохраните и обновите страницу</em></p>
<textarea name="short_description" class="form-control mb-3" readonly id="" cols="30" rows="10">{{$beach->short_description ?? ''}}</textarea>

<input class="btn btn-primary" type="submit" value="Сохранить">