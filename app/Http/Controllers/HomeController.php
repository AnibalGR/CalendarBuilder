<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Calendar;
use App\Subscription;
use Validator;
use File;
use App\Plan;
use App\Video;
use Symfony\Component\Process\ProcessBuilder;

class HomeController extends Controller {

    /**
     * Remove the specified resource from storage
     *
     * @param int $calendar_id
     * @param Request $request
     * @return Response
     */
    public function saveImage(Request $request) {

        try {
            set_time_limit(5000);

            //Clean Temp Directory
            // Retrieve all the files
            $files = glob(public_path() . '/temp/' . Auth::id() . '/*');
            foreach ($files as $file) {
                // We delete it if is file
                if (is_file($file)) {
                    unlink($file);
                }
            }

            //Get the base-64 string from data
            $filteredData = substr($request->img_val, strpos($request->img_val, ",") + 1);

            //Decode the string
            $unencodedData = base64_decode($filteredData);

            $path = public_path() . '/temp/' . Auth::id();

            if (!is_dir($path)) {
                // dir doesn't exist, make it
                mkdir($path);
            }

            $absoluteImagePath = $path . '/img.png';

            //Save the image
            file_put_contents($absoluteImagePath, $unencodedData);

            // Retrieve the calendar
            $calendar = Calendar::find($request->cal_val);
            
            $builder = new ProcessBuilder();
            $builder->setPrefix('ffmpeg');
            $builder
                    ->setArguments(array('-f', 'lavfi', '-i', 'anullsrc', '-loop', '1', '-i', $absoluteImagePath, '-c:v', 'libx264', '-strict', '-2', '-t', $calendar->videoLength, '-pix_fmt', 'yuv420p', '-vf', 'scale=1920:1080', $path . '/input1.mp4'))
                    ->getProcess()
                    ->setTimeout(3600)
                      ->run();

            // At this point we have the calendar video ready
            // We need to retrieve the other videos
            $videos = Video::where("calendar_id", $request->cal_val)->get();

            // See if there are videos
            if (count($videos) > 0) {

                // Temp counter
                $contador = 2;

                // Temp path
                $tempPath = public_path() . "/temp/" . Auth::id() . "/";

                if (!is_dir($tempPath)) {
                    // User temp dir doesn't exists, create it
                    mkdir($tempPath);
                }

                // There is at least one video
                foreach ($videos as $video) {

                    if ($video->type == "local") {

                        // It is a pre-determinated video, get the path
                        $videoPath = public_path() . "/vid/" . substr("$video->url", -7);

                        // Copy the Calendar video
                        file_put_contents($tempPath . "/input$contador.mp4", fopen("$videoPath", 'r'));
                    } else {

                        // It is a custom video
                        $videoPath = public_path() . "/videos/" . Auth::id() . "/" . substr("$video->url", -11);

                        // Copy the Calendar video
                        file_put_contents($tempPath . "/input$contador.mp4", fopen("$videoPath", 'r'));
                    }

                    $contador++;
                }

                // String to store the concat command
                $tempString = "";

                // Convert every video o an intermediate format
                for ($tempCont = 1; $tempCont <= count($videos) + 1; $tempCont++) {

                    $builder
                            ->setArguments(array('-i', $tempPath . "/input$tempCont.mp4", '-c', 'copy', '-bsf:v', 'h264_mp4toannexb', '-f', 'mpegts', $tempPath . "/intermediate$tempCont.ts"))
                            ->getProcess()
                            ->run();
                }

                // Build the create-video command
                for ($videoCounter = 2; $videoCounter <= count($videos) + 1; $videoCounter++) {

                    $tempString = $tempString . "|$tempPath" . "intermediate1.ts|$path/intermediate$videoCounter.ts";
                }

                // Clean the string from the first character
                $videosConcatString = substr($tempString, 1);

                // Add concat clausule to string
                $videosConcatString = 'concat:' . $videosConcatString;

                //New name for the video
                $newName = str_replace(" ", "", $calendar->name);

                // Process to concatenate all videos
                $builder
                        ->setArguments(array())
                        ->add('-i')
                        ->add($videosConcatString)
                        ->add('-c')
                        ->add('copy')
                        ->add('-bsf:a')
                        ->add('aac_adtstoasc')
                        ->add($tempPath . $newName . '.mp4')
                        ->getProcess()
                        ->run();

                // Path to store the generated video
                $calendarPath = public_path() . '/calendars/' . Auth::id();

                // Check if the directory exits
                if (!is_dir($calendarPath)) {

                    // dir doesn't exist, make it
                    mkdir($calendarPath);
                }

                // Move generated video to calendars path
                rename($tempPath . $newName . '.mp4', $calendarPath . '/' . $newName . '.mp4');

                //Clean Temp Directory
                // Retrieve all the files
                $files = glob(public_path() . '/temp/' . Auth::id() . '/*');
                foreach ($files as $file) {
                    // We delete it if is file
                    if (is_file($file)) {
                        unlink($file);
                    }
                }

                $returnData = array(
                    'message' => "The video was successfully created!"
                );
                return response($returnData, 200);
            } else {

                // Path to store the generated video
                $calendarPath = public_path() . '/calendars/' . Auth::id();

                // Create the dir if this doesn't exists
                if (!is_dir($calendarPath)) {
                    // dir doesn't exist, make it
                    mkdir($calendarPath);
                }

                //New name for the video
                $newName = str_replace(" ", "", $calendar->name);

                // Delete the video if it exists
                if (file_exists($calendarPath . '/' . $newName . '.mp4')) {
                    unlink($calendarPath . '/' . $newName . '.mp4');
                }

                //Save the image video
                rename($path . '/input1.mp4', $calendarPath . '/' . $newName . '.mp4');

                //Clean Temp Directory
                // Retrieve all the files
                $files = glob(public_path() . '/temp/' . Auth::id() . '/*');
                foreach ($files as $file) {
                    // We delete it if is file
                    if (is_file($file)) {
                        unlink($file);
                    }
                }

                // There is no video
                $returnData = array(
                    'message' => 'The video was successfully created!'
                );
                return response($returnData, 200);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Upload the file to the hard drive
     *
     * @param Request $request
     * @return Response
     */
    public function uploadImage(Request $request) {

        $file = $request->file;
        if ($file) {
            $validator = Validator::make($request->all(), [
                        'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            if ($validator->passes()) {
                $path = $request->file('file')->store('images/' . Auth::id(), 'images');
                return $path;
            } else {
                $returnData = array(
                    'message' => 'The file must be a jpg|png|gif|svg image!'
                );
                return response($returnData, 500);
            }
        } else {
            $response_array['status'] = 'error';
            header('Content-type: application/json');
            return json_encode($response_array);
        }
    }

    /**
     * Upload the file to the hard drive
     *
     * @param Request $request
     * @return Response
     */
    public function uploadVideo(Request $request) {

        ini_set('max_execution_time', 1300);

        $file = $request->file;

        if ($file) {
            $validator = Validator::make($request->all(), [
                        'file' => 'required|mimetypes:video/webm,video/quicktime,video/mp4,video/x-flv,video/x-msvideo,video/x-ms-asf,video/x-matroska,video/mpeg,video/ogg',
            ]);
            if ($validator->passes()) {

                $video = new Video();
                $video->calendar_id = $request->calendarID;
                $video->type = 'custom';

                $userPath = public_path() . '/videos/' . Auth::id();

                // Create if not created
                if (!is_dir($userPath)) {
                    // dir doesn't exist, make it
                    mkdir($userPath);
                }

                // Upload the file
                $path = $request->file('file')->store('videos/' . Auth::id(), 'images');

                // Generate random name
                $name = substr(md5(microtime()), rand(0, 26), 7);

                // Video URL
                $videoURL = '/videos/' . Auth::id() . "/" . $name . '.mp4';

                // Absolute path to store video
                $storePath = public_path() . $videoURL;

                // Let´s see if it is a MP4 video
//                if (ends_with($path, "mp4") || ends_with($path, "MP4")) {
//
//                    // Change the name
//                    if (rename(public_path() . "/" . $path, $storePath)) {
//
//                        $video->url = asset($videoURL);
//                        $video->save();
//                        $returnData = array(
//                            'message' => 'The video has been successfuly created!',
//                            'url' => $video->url,
//                            'videoID' => $video->id
//                        );
//                        return response($returnData, 200);
//                    }
//                }

                // Absolute path to uploaded video
                $path = public_path() . "/" . $path;

                $builder = new ProcessBuilder();
                $builder->setPrefix('ffmpeg');
                $builder
                        ->setArguments(array('-i', $path, '-s', '1920x1080', '-strict', '-2', $storePath, '-hide_banner', '-strict', '-2'))
                        ->getProcess()
                        ->setTimeout(5000)
                        ->run();
                unlink($path);

                $video->url = asset($videoURL);
                $video->save();
                $returnData = array(
                    'message' => 'The video has been successfuly created!',
                    'url' => $video->url,
                    'videoID' => $video->id
                );
                return response($returnData, 200);
            } else {
                $returnData = array(
                    'message' => 'The file must be a webm, mp4, mov, flv, avi, wmv, mkv, mpeg or ogg video!'
                );
                return response($returnData, 500);
            }
        } else {
            $response_array['status'] = 'error';
            header('Content-type: application/json');
            return json_encode($response_array);
        }
    }

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDashboard() {
        $videosPath = public_path() . '/calendars/' . Auth::id();
        if (!is_dir($videosPath)) {
            // dir doesn't exist, make it
            mkdir($videosPath);
        }
        $files = File::allFiles($videosPath);
        $calendars = Calendar::where('user_id', Auth::id())->get();
        $plans = Subscription::where('user_id', Auth::id())->where('ends_at', null)->get();

        return view('dash')->with(['calendars' => $calendars, 'planes' => $plans, 'videos' => $files, 'plans' => Plan::get()]);
    }

}
