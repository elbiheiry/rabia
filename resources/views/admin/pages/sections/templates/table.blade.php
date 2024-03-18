<table class="table table-bordered table-hover text-center">
    <thead>
    <tr >
        <th class="text-center">#</th>
        <th class="text-center">Title</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sections as $index => $section)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$section->english()->title}}</td>
            <td class="text-center">
                <a href="{{route('admin.sections.info',['id' => $section->id])}}" class="icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>