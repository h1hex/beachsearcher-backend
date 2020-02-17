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
                <td>Type</td>
                <td>Status</td>
                <th class="text-right">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($reviews as $review)
                <tr>
                    <td>{{$review->id}}</td>
                    <td>
                        @if($review->type == 1)
                            <span class="text-primary font-weight-bold">Review</span>
                        @elseif($review->type == 2)
                            <span class="text-danger font-weight-bold">Question</span>
                        @elseif($review->type == 3)
                            <span class="text-dark font-weight-bold">Story</span>
                        @endif
                    </td>
                    <td>
                        @if($review->status == 10)
                            <span class="text-primary font-weight-bold">Published</span>
                        @elseif($review->status == 9)
                            <span class="text-danger font-weight-bold">In moderation</span>
                        @elseif($review->status == 0)
                            <span class="text-dark font-weight-bold">Archived</span>
                        @endif
                    </td>
                    <td>
                        <form class="d-flex justify-content-end"
                              onsubmit="if (confirm('Delete?')){return true;} else {return false;} " action="{{route('admin.reviews.destroy', $review)}}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <a class="btn btn-secondary mr-2"  href="{{route('admin.reviews.edit', $review)}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        <h2>No data</h2>
                    </td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4">
                    <ul class="pagination pull-right">
                        {{$reviews->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>

    </div>
@endsection