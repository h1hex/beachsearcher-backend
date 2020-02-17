@extends('admin.layouts.app')

@section('content')

    <div class="container">
        {{--        @component('admin.components.breadcrumbs')--}}
        {{--            @slot('title') Редактирование продукта @endslot--}}
        {{--            @slot('parent') Главная @endslot--}}
        {{--            @slot('active') Продукты @endslot--}}
        {{--        @endcomponent--}}

        {{--        <hr>--}}

        <form action="{{route('admin.reviews.update', $review)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}

            {{-- Form include --}}
            @include('admin.reviews.partials.form')

            <input type="hidden" name="modified_by" value="{{Auth::id()}}">
        </form>

        @if($review->type === 2)
            <form action="{{route('admin.reviews.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                {{-- Form include --}}
                @include('admin.reviews.partials.reply')

                <input type="hidden" name="reply_to" value="{{$review->id}}">
                <input type="hidden" name="beach_id" value="{{$review->beach_id}}">
                <input type="hidden" name="store_reply" value="true">
                <input type="hidden" name="modified_by" value="{{Auth::id()}}">
            </form>
            @forelse($answers as $answer)
                <div class="jumbotron">
                    {{$answer->text}}
                </div>
            @empty
            @endforelse
        @endif

    </div>

@endsection