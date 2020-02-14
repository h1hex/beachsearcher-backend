<h3 class="mt-4">Catalogs</h3>
@foreach($catalogs as $catalog)
    <label for="">{{$catalog->label}}</label>
    <select class="form-control mb-3" name="{{$catalog->name}}" id="">
        @foreach($catalog->subCatalogs($catalog->id) as $sub_catalog)
            @if(isset($catalog->values()->where('beach_id', $beach->id)->first()->int) &&
                $catalog->values()->where('beach_id', $beach->id)->first()->int === $sub_catalog->id)
                    <option selected value="{{$sub_catalog->id}}">{{$sub_catalog->value}}</option>
                    @continue
            @endif
            <option value="{{$sub_catalog->id}}">{{$sub_catalog->value}}</option>
        @endforeach
    </select>
@endforeach

<button class="btn btn-primary">Update</button>