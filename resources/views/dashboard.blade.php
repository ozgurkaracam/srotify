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
                                <th scope="col">Title</th>
                                <th scope="col">Type</th>
                                <th scope="col">Author</th>
                                <th scope="col">See Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stories as $key=>$story)
                                <tr>
                                    <td>{{$story->title}}</td>
                                    <td>{{$story->type}}</td>
                                    <td>{{$story->user->name}}</td>
                                    <td>

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
