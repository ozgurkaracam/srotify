<form action="{{ route('stories.update',$story->id) }}" name="forms" method="POST">
    @csrf
    @method('PUT')

    <div class="modal fade" id="exampleModal{{$story->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$story->title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $story->title }}">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <input type="text" class="form-control" name="body" id="body" value="{{ $story->body }}">
                    </div>
                    <div class="form-group">
                        <label for="tittypele">Type</label>
                        <input type="text" class="form-control" name="type" id="type" value="{{ $story->type }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
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

            </div>
        </div>
    </div>

</form>