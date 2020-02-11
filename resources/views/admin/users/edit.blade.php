@extends('admin.layouts.app')

@section('content')

    <div class="container">
        {{--        @component('admin.components.breadcrumbs')--}}
        {{--            @slot('title') Редактирование продукта @endslot--}}
        {{--            @slot('parent') Главная @endslot--}}
        {{--            @slot('active') Продукты @endslot--}}
        {{--        @endcomponent--}}

        {{--        <hr>--}}

        <form action="{{route('admin.users.update', $user)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}

            {{-- Form include --}}
            @include('admin.users.partials.form')

            <input type="hidden" name="modified_by" value="{{Auth::id()}}">
        </form>

    </div>

@endsection