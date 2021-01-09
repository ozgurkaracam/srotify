@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/album.css') }}">
    @endsection
@section('content')
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-10">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">All Stories--}}
{{--                        <div class="float-right">--}}
{{--                            <a href="{{route('dashboard')}}">All</a> | <a href="{{route('dashboard',['type'=>'short'])}}">Short</a> | <a href="{{route('dashboard',['type'=>'long'])}}">Long</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="card-body">--}}
{{--                        <table class="table table-striped">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th scope="col">#</th>--}}
{{--                                <th scope="col">Title</th>--}}
{{--                                <th scope="col">Type</th>--}}
{{--                                <th scope="col">Author</th>--}}
{{--                                <th scope="col">See Details</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($stories as $key=>$story)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ isset($_GET['page']) ? ((($_GET['page'])-1)*5)+$key+1 : $key+1 }}</td>--}}
{{--                                    <td>{{$story->title}}</td>--}}
{{--                                    <td>{{$story->type}}</td>--}}
{{--                                    <td>{{$story->user->name}}</td>--}}
{{--                                    <td>--}}



{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                        {{ $stories->withQueryString()->links() }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Stories</h1>
            <p class="lead text-muted">Our Author's Stories</p>
            <p>
                <a href="{{route('dashboard')}}" class="btn btn-primary my-2">All Stories</a>
                <a href="{{route('dashboard',['type'=>'short'])}}" class="btn btn-secondary my-2">Short</a>
                <a href="{{route('dashboard',['type'=>'long'])}}" class="btn btn-secondary my-2">Long</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach($stories as $story)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ $story->image }}" alt="{{ $story->image }}" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22226%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20226%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1769ee29a52%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1769ee29a52%22%3E%3Crect%20width%3D%22348%22%20height%3D%22226%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.7109375%22%20y%3D%22120.6875%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
{{--                            <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22226%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20226%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1769ee29a52%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1769ee29a52%22%3E%3Crect%20width%3D%22348%22%20height%3D%22226%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.7109375%22%20y%3D%22120.6875%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">--}}
                            <div class="card-body">
                                <div class="card-title">{{$story->title}}</div>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($story->body,60) }}...</p>
                                <div class="my-2">
                                    Tags:
                                    @foreach($story->tags as $tag)
                                        <button class="btn btn-sm btn-outline-primary">{{$tag->title}}</button>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">

                                        @if(\Illuminate\Support\Facades\Auth::user())
                                            <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#exampleModal{{$story->id}}">View</button>

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
                                                            <img src="{{$story->image}}" style="width: 100%; height: 250px" alt="">
                                                            {{$story->body}}
                                                            <br>
                                                            <div>
                                                                <div class="float-left">
                                                                @foreach($story->tags as $tag)
                                                                        <button class="btn btn-outline-primary">{{$tag->title}}</button>
                                                                @endforeach
                                                                </div>
                                                                <div class="float-right">
                                                                    <span class="text-muted text-sm-right"> Author : {{$story->user->name}}</span>
                                                                </div>
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
                                    </div>
                                    <small class="text-muted">{{$story->user->name}} - {{ $story->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>
            {{ $stories->withQueryString()->links() }}
        </div>
    </div>

</main>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
        <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
    </div>
</footer>


@endsection
