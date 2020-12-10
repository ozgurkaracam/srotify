@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        MY STORIES
                    </div>
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
                                    <td><div class="btn btn-danger">DELETE</div> <div class="btn btn-info" data-toggle="modal" data-target="#exampleModal">UPDATE</div></td>
                                </tr>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{$story->title}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form role="form" action="{{ route('stories.update',$story->id) }}" method="POST">
                                                @csrf
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" class="form-control" id="title" value="{{ $story->title }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="body">Body</label>
                                                    <input type="text" class="form-control" id="body" value="{{ $story->body }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tittypele">Type</label>
                                                    <input type="text" class="form-control" id="type" value="{{ $story->type }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Status</label>
{{--                                                    <input type="text" class="form-control" id="status" value="{{ $story->status }}">--}}
                                                    <select class="form-control" name="status" id="">
                                                        <option value="0"> No</option>
                                                        <option value="1" {{$story->status==1 ? 'selected' : ''}}> Yes</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>

                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
