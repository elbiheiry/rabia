<div class="modal-dialog" role="document">
    <div class="modal-content text-center">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit filter</h5>
        </div>
        <form class="edit-form" action="{{route('admin.filters.edit',['id' => $filter->id])}}" method="post" enctype="multipart/form-data">
            <div class="modal-body row">
                {!! csrf_field() !!}
                <div class="form-group col-md-6">
                    <label>filter name in arabic</label>
                    <input class="form-control" type="text" name="name_ar" value="{{$filter->arabic()->name}}">
                </div>
                <div class="form-group col-md-6">
                    <label>filter name in english</label>
                    <input class="form-control" type="text" name="name_en" value="{{$filter->english()->name}}">
                </div>
                <div class="form-group col-md-6">
                    <label>Filter main category</label>
                    <select name="parent_id" class="form-control">
                        <option value="0" @if($filter->parent_id == 0){{'selected'}}@endif>Main category</option>
                        @foreach($filters as $single)
                            <option value="{{$single->id}}" @if($single->id == $filter->parent_id){{'selected'}}@endif>{{$single->english()->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>