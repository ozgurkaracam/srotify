@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>MY STORIES</div>
                        <div class="btn btn-success" data-toggle="modal" data-target="#createStory">CREATE STORY
                        </div>
                    </div>
                    @include('stories.createstory')
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Body</th>
                                <th scope="col">Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">User</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stories as $key=>$story)
                                <tr class="align-items-center">
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $story->title }}</td>
                                    <td>{{ $story->body }}</td>
                                    <td>{{ $story->type }}</td>
                                    <td>{{ $story->status }}</td>
                                    <td>{{ $story->user->email }}</td>

                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <form action="{{ route('stories.destroy',$story->id) }}" name="s{{$story->id}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$story->id}}">
                                                        @method('DELETE')<button type="submit" class="btn btn-danger">DELETE</button>
                                                    </form>
                                                </div><div>
                                                    <div class="btn btn-info" data-toggle="modal" data-target="#exampleModal{{$story->id}}">UPDATE</div>

                                                </div>
                                                @include('stories.editstory')
                                            </div>
                                        </td>

                                </tr>


                                @endforeach
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
