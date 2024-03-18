<table class="table table-bordered table-hover text-center">
    <thead>
    <tr >
        <th class="text-center">#</th>
        <th class="text-center">Title</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($partners as $index => $partner)
        <tr>
            <td>{{$index+1}}</td>
            <td><img src="{{asset('storage/uploads/partners/'.$partner->image)}}" ></td>
            <td class="text-center">
                <a href="{{route('admin.partners.info',['id' => $partner->id])}}" class="icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </a>
                <button data-url="{{route('admin.partners.delete',['id' => $partner->id])}}" data-toggle="modal" data-target="#delete_user" class="icon-btn red-bc deleteBTN">
                    <i class="fa fa-trash-o"></i>
                    Delete
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>