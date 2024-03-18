<table class="table table-bordered table-hover text-center">
    <thead>
    <tr >
        <th class="text-center">#</th>
        <th class="text-center">Title</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($projects as $index => $project)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$project->english()->name}}</td>
            <td class="text-center">
                <a href="{{route('admin.projects.images',['id' => $project->id])}}" class="icon-btn blue-bc">
                    <i class="fa fa-image"></i>
                    Images
                </a>
                <a href="{{route('admin.projects.info',['slug' => $project->slug])}}" class="icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </a>
                <button data-url="{{route('admin.projects.delete',['slug' => $project->slug])}}" data-toggle="modal" data-target="#delete_user" class="icon-btn red-bc deleteBTN">
                    <i class="fa fa-trash-o"></i>
                    Delete
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>