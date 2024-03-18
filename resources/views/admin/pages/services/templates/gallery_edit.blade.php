<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit image</h5>
        </div>
        <form class="edit-form" action="{{route('admin.services.images.edit',['id' => $image->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body row">
                {!! csrf_field() !!}
                <div class="img-block">
                    <label>Image</label>
                    <img src="{{asset('storage/uploads/services/'.$image->image)}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                    <input type="file" name="image" style="display: none;">
                    <div class="text-danger text-center">Please click on image to change it</div>
                    <div class="text-danger text-center">Image resolution should be : 818 * 511</div>
                </div>

                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
