<table class="table table-bordered table-hover text-center">
    <thead>
    <tr >
        <th class="text-center">#</th>
        <th class="text-center">Title</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($articles as $index => $article)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$article->english()->name}}</td>
            <td class="text-center">
                <a href="{{route('admin.articles.info',['slug' => $article->slug])}}" class="icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </a>
                <button data-url="{{route('admin.articles.delete',['slug' => $article->slug])}}" data-toggle="modal" data-target="#delete_user" class="icon-btn red-bc deleteBTN">
                    <i class="fa fa-trash-o"></i>
                    Delete
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>