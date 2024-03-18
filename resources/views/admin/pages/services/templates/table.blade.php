<table class="table table-bordered table-hover text-center">
    <thead>
    <tr >
        <th class="text-center">#</th>
        <th class="text-center">Title</th>
        <th class="text-center">Main service</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
        @foreach($services as $index => $service)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$service->english()->name}}</td>
                <td>{{$service->parent_id == 0 ? 'Main service' : $service->main_service->english()->name}}</td>
                <td class="text-center">
                    <a href="{{route('admin.services.images',['id' => $service->id])}}" class="icon-btn blue-bc">
                        <i class="fa fa-image"></i>
                        Images
                    </a>
                    <a href="{{route('admin.services.videos',['id' => $service->id])}}" class="icon-btn blue-bc">
                        <i class="fa fa-camera"></i>
                        Videos
                    </a>
                    <a href="{{route('admin.services.info',['slug' => $service->slug])}}" class="icon-btn green-bc">
                        <i class="fa fa-pencil"></i>
                        Edit
                    </a>
                    <button data-url="{{route('admin.services.delete',['slug' => $service->slug])}}" data-toggle="modal" data-target="#delete_user" class="icon-btn red-bc deleteBTN">
                        <i class="fa fa-trash-o"></i>
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>