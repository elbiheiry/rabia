<table class="table table-bordered table-hover text-center">
    <thead>
    <tr >
        <th>
            <div class="radio-wrap">
                <input type="checkbox" class="checkall" id="checkall">
                <label for="checkall"></label>
            </div>
        </th>
        <th class="text-center">#</th>
        <th class="text-center">title</th>
        <th class="text-center">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($videos as $index => $video)
        <tr>
            <td>
                <div class="radio-wrap">
                    <input type="checkbox" name="video_id[]" value="{{$video->id}}" id="check{{$video->id}}">
                    <label for="check{{$video->id}}"></label>
                </div>
            </td>
            <td>{{$index+1}}</td>
            <td>{{$video->english()->title}}</td>
            <td class="text-center">
                <button type="button" data-url="{{route('admin.services.videos.info',['id' => $video->id])}}" class="btn-modal-view icon-btn green-bc">
                    <i class="fa fa-pencil"></i>
                    Edit
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
