@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Deleted Stories

                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Type</th>
                                <th scope="col">Author</th>
                                <th scope="col">Return</th>
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
                                            <a href="{{route('savedeleted',$story->id)}}" class="btn btn-primary">
                                                Return it!
                                            </a>



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
