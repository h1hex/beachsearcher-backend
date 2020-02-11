@extends('admin.layouts.app')

@section('content')
    <div class="container">
        {{--        @component('admin.components.breadcrumbs')--}}
        {{--            @slot('title') Список продуктов @endslot--}}
        {{--            @slot('parent') Главная @endslot--}}
        {{--            @slot('active') Продукты @endslot--}}
        {{--        @endcomponent--}}

        <hr>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Ник</th>
                <th class="text-right">Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>
                        <form class="d-flex justify-content-end"
                              onsubmit="if (confirm('Удалить?')){return true;} else {return false;} " action="{{route('admin.users.destroy', $user)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <a class="btn btn-secondary mr-2"  href="{{route('admin.users.edit', $user)}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">
                        <h2>Данные отсутствуют</h2>
                    </td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{$users->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>

    </div>
@endsection