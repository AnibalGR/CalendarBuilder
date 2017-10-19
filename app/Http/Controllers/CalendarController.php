<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Calendar;

class CalendarController extends Controller {

    //
    public function deleteCalendar($calendar_id, Request $request) {

        // Look for the calendar in the db
        $calendar = Calendar::find($calendar_id);

        // Look for the video to remove
        $video = $calendar->video;

        if ($video != "none") {

            // Check if it is a local video
            if (ends_with($video, "001.mp4") || ends_with($video, "002.mp4") || ends_with($video, "003.mp4") ||
                    ends_with($video, "004.mp4") || ends_with($video, "005.mp4") || ends_with($video, "006.mp4") ||
                    ends_with($video, "007.mp4") || ends_with($video, "008.mp4") || ends_with($video, "009.mp4") ||
                    ends_with($video, "010.mp4") || ends_with($video, "011.mp4") || ends_with($video, "012.mp4")) {
                
            } else {
                // It is not a local video, let´s get the name
                $videoName = substr("$video", -11);

                // Absolute path to video
                $videoPath = public_path() . "/videos/" . Auth::id() . "/" . $videoName;

                // Delete the video
                if (!unlink($videoPath)) {
                    return response()->json(['error' => 'The video could not be removed'], 500);
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
            $calendar->video = $request->videoCal;
            $calendar->content = $request->contentCal;
            if ($calendar->save()) {
                return "The Calendar have been saved!";
            }
            return "The Calendar could not been saved!";
        }

        return "You can not save this Calendar!";
    }

    public function editCalendar($calendar_id, Request $request) {

        $calendar = Calendar::find($calendar_id);

        if ($calendar) {
            if ($calendar->user_id == Auth::id()) {
                return view('home', ['id' => $calendar->id, 'name' => $calendar->name, 'year' => $calendar->year, 'month' => $calendar->month, 'themeC' => $calendar->themeC, 'theme' => $calendar->theme, 'layout' => $calendar->layout, 'background' => $calendar->background, 'video' => $calendar->video, 'content' => $calendar->content]);
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
        $calendar->video = 'none';
        $calendar->content = '{"version":"2.0.0-beta7","objects":[]}';
        if ($calendar->save()) {
            return redirect()->route('editCalendar', ['id' => $calendar->id, 'name' => $calendar->name, 'year' => $calendar->year, 'month' => $calendar->month, 'themeC' => $calendar->themeC, 'theme' => $calendar->theme, 'layout' => $calendar->layout, 'video' => $calendar->video, 'content' => $calendar->content]);
        }
    }

}
