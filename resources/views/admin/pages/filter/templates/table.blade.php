<table class="table table-bordered table-hover text-center">
    <thead>
    <tr >
        <th class="text-center">#</th>
        <th class="text-center">Name</th>
        <th class="text-center">Main category</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($filters as $index => $filter)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$filter->english()->name}}</td>
            <td>{{$filter->parent_id ==0 ? 'Main category' : $filter->parentFilter->english()->name}}</td>
            <td class="text-center">
                <button data-url="{{route('admin.filters.info',['id' => $filter->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </button>
                <button data-url="{{route('admin.filters.delete',['id' => $filter->id])}}" data-toggle="modal" data-target="#delete_user" class="icon-btn red-bc deleteBTN">
                    <i class="fa fa-trash-o"></i>
                    Delete
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>