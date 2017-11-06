<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;
use App\Video;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller {

    //

    public function store(Request $request) {

        // Get the sended parameters
        $calendarID = $request->calendarID;
        $videoURL = $request->videoURL;
        $videoType = $request->videoType;

        // Create the new video entity
        $newVideo = new Video();
        $newVideo->calendar_id = $calendarID;
        $newVideo->url = $videoURL;
        $newVideo->type = $videoType;

        if ($newVideo->save()) {
            return response($newVideo->id, 200);
        }

        return response("The Calendar could not been saved!", 500);
    }

    public function removeVideo(Request $request) {

        try {
            // Get the video ID
            $videoID = substr($request->videoID, 5, strlen($request->videoID));

            // Look for the video in the DB
            $video = Video::find($videoID);

            // If video exists
            if ($video) {

                $videoURL = $video->url;

                if (ends_with($videoURL, "001.mp4") || ends_with($videoURL, "002.mp4") || ends_with($videoURL, "003.mp4") ||
                        ends_with($videoURL, "004.mp4") || ends_with($videoURL, "005.mp4") || ends_with($videoURL, "006.mp4") ||
                        ends_with($videoURL, "007.mp4") || ends_with($videoURL, "008.mp4") || ends_with($videoURL, "009.mp4") ||
                        ends_with($videoURL, "010.mp4") || ends_with($videoURL, "011.mp4") || ends_with($videoURL, "012.mp4")) {
                    if ($video->delete()) {
                        $returnData = array(
                            'message' => 'The video has been successfuly deleted!'
                        );
                        return response($returnData, 200);
                    } else {
                        $returnData = array(
                            'message' => 'The video could not been deleted!'
                        );
                        return response($returnData, 500);
                    }
                } else {
                    $videoName = substr("$videoURL", -11);

                    $videoPath = public_path() . "/videos/" . Auth::id() . "/" . $videoName;

                    unlink($videoPath);

                    if ($video->delete()) {
                        $returnData = array(
                            'message' => 'The video has been successfuly deleted!'
                        );
                        return response($returnData, 200);
                    } else {
                        $returnData = array(
                            'message' => 'The video could not been deleted!'
                        );
                        return response($returnData, 500);
                    }
                }
            } else {
                $returnData = array(
                    'message' => 'The video doesn\'t exists!'
                );
                return response($returnData, 500);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
