<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Calendar;
use App\Video;

class CalendarController extends Controller {

    //
    public function deleteCalendar($calendar_id, Request $request) {

        // Look for the calendar in the db
        $calendar = Calendar::find($calendar_id);

        // Look for the videos to remove
        $videos = Video::where('calendar_id', $calendar_id)->get();

        // Check if there is any video
        if (count($videos) > 0) {

            // Analize each video
            foreach ($videos as $video) {

                if ($video->url != "none") {

                    // Check if it is a local video
                    if (ends_with($video->url, "001.mp4") || ends_with($video->url, "002.mp4") || ends_with($video->url, "003.mp4") ||
                            ends_with($video->url, "004.mp4") || ends_with($video->url, "005.mp4") || ends_with($video->url, "006.mp4") ||
                            ends_with($video->url, "007.mp4") || ends_with($video->url, "008.mp4") || ends_with($video->url, "009.mp4") ||
                            ends_with($video->url, "010.mp4") || ends_with($video->url, "011.mp4") || ends_with($video->url, "012.mp4")) {
                        
                    } else {
                        // It is not a local video, let´s get the name
                        $videoName = substr("$video->url", -11);

                        // Absolute path to video
                        $videoPath = public_path() . "/videos/" . Auth::id() . "/" . $videoName;

                        // Delete the video
                        if (!unlink($videoPath)) {
                            return response()->json(['error' => 'The video could not be removed'], 500);
                        }
                    }
                }
            }
        }

        // Remove it form it
        if ($calendar->delete()) {
            return response()->json(['success' => 'The calendar has been successfully removed!'], 200);
        }

        // Return error if not removed
        return response()->json(['error' => 'The calendar could not be removed'], 500);
    }

    public function saveCalendar(Request $request) {
        $calendar = Calendar::find($request->idCal);
        if ($calendar->user_id == Auth::id()) {
            $calendar->theme = $request->themeCal;
            $calendar->themeC = $request->themeCCal;
            $calendar->layout = $request->layoutCal;
            $calendar->background = $request->backgroundCal;
            $calendar->color = $request->colorCal;
            $calendar->colorYear = $request->colorYearCal;
            $calendar->colorWeek = $request->colorWeekCal;
            $calendar->colorDay = $request->colorDayCal;
            $calendar->videoLength = $request->cal_length;
            $calendar->content = $request->contentCal;
            if ($calendar->save()) {
                return response("The calendar has been saved successfully!", 200);
            }
            return response("The Calendar could not been saved!", 500);
        }
        return response("You can not save this Calendar!", 500);
    }

    public function editCalendar($calendar_id, Request $request) {

        $calendar = Calendar::find($calendar_id);
        
        $videos = Video::where("calendar_id", $calendar_id)->get();
        
        if ($calendar) {
            if ($calendar->user_id == Auth::id()) {
                return view('home', ['id' => $calendar->id, 'name' => $calendar->name, 'year' => $calendar->year, 
                    'month' => $calendar->month, 'themeC' => $calendar->themeC, 'theme' => $calendar->theme, 
                    'layout' => $calendar->layout, 'background' => $calendar->background, 'color' => $calendar->color, 
                    'colorYear' => $calendar->colorYear, 'colorWeek' => $calendar->colorWeek, 
                    'colorDay' => $calendar->colorDay,'videoLength' => $calendar->videoLength, 'content' => $calendar->content,
                    'videos' => $videos]);
            }
        }
        return redirect()->back();
    }

    public function showCalendarBuilder(Request $request) {

        $name = $request->input('name');
        $year = $request->input('year');
        $month = $request->input('month');

        $calendar = new Calendar();
        $calendar->user_id = Auth::id();
        $calendar->name = $name;
        $calendar->year = $year;
        $calendar->month = $month;
        $calendar->theme = 'none';
        $calendar->themeC = 'standard';
        $calendar->layout = 'none';
        $calendar->background = 'none';
        $calendar->color = 'none';
        $calendar->colorYear = '#000000';
        $calendar->colorWeek = '#000000';
        $calendar->colorDay = '#000000';
        $calendar->videoLength = '15';
        $calendar->content = '{"version":"2.0.0-beta7","objects":[]}';
        if ($calendar->save()) {
            return redirect()->route('editCalendar', ['id' => $calendar->id]);
        }
    }

}
