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

