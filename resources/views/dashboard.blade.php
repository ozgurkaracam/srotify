@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">All Stories
                        <div class="float-right">
                            <a href="{{route('dashboard')}}">All</a> | <a href="{{route('dashboard',['type'=>'short'])}}">Short</a> | <a href="{{route('dashboard',['type'=>'long'])}}">Long</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Type</th>
                                <th scope="col">Author</th>
                                <th scope="col">See Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stories as $key=>$story)
                                <tr>
                                    <td>{{ isset($_GET['page']) ? ((($_GET['page'])-1)*5)+$key+1 : $key+1 }}</td>
                                    <td>{{$story->title}}</td>
                                    <td>{{$story->type}}</td>
                                    <td>{{$story->user->name}}</td>
                                    <td>
                                        @if(\Illuminate\Support\Facades\Auth::user())
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$story->id}}">
                                            See Details
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$story->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{ $story->title }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{$story->body}}
                                                        <br>
                                                        <div class="float-right">
                                                            <span class="text-muted text-sm-right"> Author : {{$story->user->name}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                            Please login
                                        @endif


                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $stories->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
