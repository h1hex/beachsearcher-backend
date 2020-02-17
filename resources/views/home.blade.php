@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">Testing add reviews</div>
                <div class="card-body">
                    <form action="{{route('home.add.review')}}" method="post">
                        {{csrf_field()}}

                        <label for="">Beach</label>
                        <select class="form-control mb-3" name="beach_id" id="" required>
                            @foreach($beaches as $beach)
                                <option value="{{$beach->id}}">{{$beach->title}}</option>
                            @endforeach
                        </select>

                        <label for="">Rating</label>
                        <select class="form-control mb-3" name="rating" id="" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>

                        <textarea class="form-control mb-3" name="text" id="" cols="30" rows="10" placeholder="Your review" required>
                        </textarea>

                        <button type="submit" class="btn btn-primary">Add review</button>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">Testing add question</div>
                <div class="card-body">
                    <form action="{{route('home.add.review')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="type" value="2">

                        <label for="">Beach</label>
                        <select class="form-control mb-3" name="beach_id" id="" required>
                            @foreach($beaches as $beach)
                                <option value="{{$beach->id}}">{{$beach->title}}</option>
                            @endforeach
                        </select>

                        <textarea class="form-control mb-3" name="text" id="" cols="30" rows="10" placeholder="Your question" required>
                        </textarea>

                        <button type="submit" class="btn btn-primary">Add question</button>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">Testing add story</div>
                <div class="card-body">
                    <form action="{{route('home.add.review')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="type" value="3">

                        <label for="">Beach</label>
                        <select class="form-control mb-3" name="beach_id" id="" required>
                            @foreach($beaches as $beach)
                                <option value="{{$beach->id}}">{{$beach->title}}</option>
                            @endforeach
                        </select>

                        <textarea class="form-control mb-3" name="text" id="" cols="30" rows="10" placeholder="Your story" required>
                        </textarea>

                        <button type="submit" class="btn btn-primary">Add story</button>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">Your reviews</div>
                <div class="card-body">
                    @forelse($reviews as $review)
                        <div class="jumbotron">
                            Rating: {{$review->rating}}
                            <br>
                            {{$review->text}}
                        </div>
                    @empty
                        No data
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
