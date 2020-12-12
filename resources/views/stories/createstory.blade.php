@if($errors->any())
    <script>
        $(document).ready(function(){
            $('#createStory').modal({show: true});
        }
    </script>
@endif

<form action="{{route('stories.store')}}" name="form1" method="POST">
    @csrf

    <div class="modal fade" id="createStory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Story</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title','') }}">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <input type="text" class="form-control" name="body" id="body" value="">
                    </div>
                    <div class="form-group">
                        <label for="tittypele">Type</label>
                        <input type="text" class="form-control" name="type" id="type" value="">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="">
                            <option value="0"> No</option>
                            <option value="1"> Yes</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>

                </div>

            </div>
        </div>
    </div>

</form>
