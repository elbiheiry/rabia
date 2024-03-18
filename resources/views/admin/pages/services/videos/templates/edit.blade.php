<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit video</h5>
        </div>
        <form class="edit-form" action="{{route('admin.services.videos.edit',['id' => $video->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body row">
                {!! csrf_field() !!}

                <div class="form-group col-md-12">
                    <label>Video link</label>
                    <input class="form-control" type="text" name="link" value="{{$video->link}}">
                </div>
                <div class="form-group col-md-6">
                    <label>title in english</label>
                    <input class="form-control" type="text" name="title_en" value="{{$video->english()->title}}">
                </div>
                <div class="form-group col-md-6">
                    <label>title in arabic</label>
                    <input class="form-control" type="text" name="title_ar" value="{{$video->arabic()->title}}">
                </div>
                <div class="form-group col-md-6">
                    <label>description in english</label>
                    <textarea class="form-control" name="description_en">{{$video->english()->description}}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label>description in arabic</label>
                    <textarea class="form-control" name="description_ar">{{$video->arabic()->description}}</textarea>
                </div>

                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
