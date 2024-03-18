<table class="table table-bordered table-hover text-center">
    <thead>
    <tr >
        <th class="text-center">#</th>
        <th class="text-center">Title</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($certificates as $index => $certificate)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$certificate->english()->name}}</td>
            <td class="text-center">
                <a href="{{route('admin.certificates.info',['id' => $certificate->id])}}" class="icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </a>
                <button data-url="{{route('admin.certificates.delete',['id' => $certificate->id])}}" data-toggle="modal" data-target="#delete_user" class="icon-btn red-bc deleteBTN">
                    <i class="fa fa-trash-o"></i>
                    Delete
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>