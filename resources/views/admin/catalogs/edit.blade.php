@extends('admin.layouts.app')

@section('content')

    <div class="container">
        {{--        @component('admin.components.breadcrumbs')--}}
        {{--            @slot('title') Редактирование продукта @endslot--}}
        {{--            @slot('parent') Главная @endslot--}}
        {{--            @slot('active') Продукты @endslot--}}
        {{--        @endcomponent--}}

        {{--        <hr>--}}

        <form action="{{route('admin.catalogs.update', $catalog)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}

            {{-- Form include --}}
            @include('admin.catalogs.partials.form')

            <input type="hidden" name="modified_by" value="{{Auth::id()}}">
        </form>

        <form action="{{route('admin.catalogs.update', $catalog)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="option" value="true">
            {{csrf_field()}}

            {{-- Form include --}}
            @include('admin.catalogs.partials.options')

            <input type="hidden" name="created_by" value="{{Auth::id()}}">
        </form>

        <h3 class="mt-5">Options</h3>
        <table class="table table-striped mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th class="text-right">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($catalog->subCatalogs($catalog->id) as $sub_catalog)
                <tr>
                    <td>{{$sub_catalog->id}}</td>
                    <td>{{$sub_catalog->value}}</td>
                    <td>
                        <form class="d-flex justify-content-end"
                              onsubmit="if (confirm('Remove?')){return true;} else {return false;} " action="{{route('admin.catalogs.destroy', $sub_catalog)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">
                        <h2>No data</h2>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>


    </div>

@endsection