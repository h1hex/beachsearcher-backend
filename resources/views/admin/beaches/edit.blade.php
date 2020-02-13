@extends('admin.layouts.app')

@section('content')

    <div class="container">
        {{--        @component('admin.components.breadcrumbs')--}}
        {{--            @slot('title') Редактирование продукта @endslot--}}
        {{--            @slot('parent') Главная @endslot--}}
        {{--            @slot('active') Продукты @endslot--}}
        {{--        @endcomponent--}}

        {{--        <hr>--}}

        <form action="{{route('admin.beaches.update', $beach)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}

            {{-- Form include --}}
            @include('admin.beaches.partials.form')

            <input type="hidden" name="modified_by" value="{{Auth::id()}}">
        </form>

        <form action="{{route('admin.beaches.update', $beach)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}

            {{-- Form include --}}
            @include('admin.beaches.partials.params')

            <input type="hidden" name="update_params" value="true">
        </form>

        <form action="{{route('admin.beaches.update', $beach)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}

            {{-- Form include --}}
            @include('admin.beaches.partials.catalogs')

            <input type="hidden" name="update_catalogs" value="true">
        </form>

    </div>

@endsection