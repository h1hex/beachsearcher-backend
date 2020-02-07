@extends('admin.layouts.app')

@section('content')

    <div class="container">
        {{--        @component('admin.components.breadcrumbs')--}}
        {{--            @slot('title') Создание продукта @endslot--}}
        {{--            @slot('parent') Главная @endslot--}}
        {{--            @slot('active') Продукты @endslot--}}
        {{--        @endcomponent--}}

        {{--        <hr>--}}

        <form action="{{route('admin.beaches.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            {{-- Form include --}}
            @include('admin.beaches.partials.form')

            <input type="hidden" name="created_by" value="{{Auth::id()}}">
        </form>

    </div>

@endsection