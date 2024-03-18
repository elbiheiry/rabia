<table class="table table-bordered table-hover text-center">
    <thead>
    <tr >
        <th class="text-center">#</th>
        <th class="text-center">Image</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sliders as $index => $slider)
        <tr>
            <td>{{$index+1}}</td>
            <td><img src="{{asset('storage/uploads/sliders/'.$slider->image)}}" ></td>
            <td class="text-center">
                <a href="{{route('admin.sliders.info',['id' => $slider->id])}}" class="icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </a>
                <button data-url="{{route('admin.sliders.delete',['id' => $slider->id])}}" data-toggle="modal" data-target="#delete_user" class="icon-btn red-bc deleteBTN">
                    <i class="fa fa-trash-o"></i>
                    Delete
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>