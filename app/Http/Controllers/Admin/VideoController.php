<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\VideoRequest;
use App\Service;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    //
    public function getIndex($id)
    {
        $videos = Service::find($id)->videos()->orderBy('id', 'DESC')->get();

        return view('admin.pages.services.videos.index', compact('videos', 'id'));
    }

    public function getInfo($id)
    {
        $video = Video::find($id);

        return view('admin.pages.services.videos.templates.edit', compact('video'));
    }

    public function postIndex(VideoRequest $request, $id)
    {
        $request->save($id);

        $videos = Service::find($id)->videos()->orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.services.videos.templates.table', compact('videos'))->render()];

    }

    public function postEdit(VideoRequest $request, $id)
    {
        $request->edit($id);

        $video_id = Video::find($id)->value('service_id');

        $videos = Service::find($video_id)->videos()->orderBy('id', 'DESC')->get();

        return ['status' => 'success', 'html' => view('admin.pages.services.videos.templates.table', compact('videos'))->render()];
    }

    public function postDelete(Request $request, $id)
    {
        if (!$request->video_id) {
            return ['status' => 'error', 'data' => ['You must select one video at least']];
        } else {
            foreach ($request->video_id as $video_id) {
                $video = Video::find($video_id);

                $video->delete();

            }
            $videos = Service::find($id)->videos()->orderBy('id', 'DESC')->get();

            return ['status' => 'success', 'html' => view('admin.pages.services.videos.templates.table', compact('videos'))->render()];
        }
    }
}
