<label for="">Ник</label>
<input type="text" class="form-control mb-3" name="name" placeholder="Ник" value="{{$user->name ?? ''}}">

<label for="">Email</label>
<input type="email" class="form-control mb-3" name="email" placeholder="Email" value="{{$user->email ?? ''}}">

<label for="">Семейный статус</label>
<input type="text" class="form-control mb-3" name="marital_status" placeholder="Семейный статус" value="{{$user->marital_status ?? ''}}">

<label for="">Аватарка</label>
<input type="file" class="form-control-file mb-3" name="avatar">
@isset($user->avatar)
    <div class="jumbotron mt-2 mb-2" style="max-height: 350px; overflow: auto">
        <h3>Аватарка</h3>
        @php
            $image = unserialize($user->avatar)
        @endphp
        <img src="{{$image}}" alt="" class="w-100">
    </div>
@endif


<input class="btn btn-primary" type="submit" value="Сохранить">