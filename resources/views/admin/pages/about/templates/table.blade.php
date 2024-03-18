<table class="table table-bordered table-hover text-center">
    <thead>
    <tr >
        <th class="text-center">#</th>
        <th class="text-center">Title</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($abouts as $index => $about)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$about->english()->title}}</td>
            <td class="text-center">
                <a href="{{route('admin.about.info',['id' => $about->id])}}" class="icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>