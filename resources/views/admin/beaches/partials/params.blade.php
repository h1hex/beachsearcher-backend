<h2 class="mt-4">Обновление Параметров</h2>
{{--@foreach($beach_metas as $beach_meta)--}}
{{--    <label for="">{{$beach_meta->field_title}}</label>--}}
{{--    <input class="form-control mb-3" type="text" name="{{$beach_meta->key}}" placeholder="{{$beach_meta->field_title}}" value="{{$beach_meta->value ?? ''}}">--}}
{{--@endforeach--}}

@foreach($params as $param)
    <label for="">{{$param->label ?? ''}}</label>
    <input type="{{$param->label_type ?? 'text'}}" class="form-control mb-3"
            placeholder="{{$param->label ?? ''}}" name="{{$param->name ?? ''}}"
            value="{{ $param->values()->where('beach_id', $beach->id)->first()->{$param->type} ?? ''}}" step="0.01">
@endforeach

<button type="submit" class="btn btn-primary">Сохранить</button>