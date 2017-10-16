<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Calendar;
use App\Subscription;
use Validator;
use File;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\ProcessBuilder;
use Symfony\Component\Process\Exception\ProcessFailedException;


class HomeController extends Controller
{
    /**
     * Remove the specified resource from storage
     *
     * @param int $calendar_id
     * @param Request $request
     * @return Response
     */
    
    public function generateVideo(){
        
    }
    
    public function saveImage(Request $request){
        
        try{
            set_time_limit(300);
            
        //Get the base-64 string from data
        $filteredData=substr($request->img_val, strpos($request->img_val, ",")+1);
 
        //Decode the string
        $unencodedData=base64_decode($filteredData);
        
        $path = public_path().'/temp/' . Auth::id();
        
        if (!is_dir($path)) {
            // dir doesn't exist, make it
            mkdir($path);
        }
        
        $absoluteImagePath = $path . '/img.png';
        
        //Save the image
        file_put_contents($absoluteImagePath, $unencodedData);
        
        $builder = new ProcessBuilder();
        $builder->setPrefix('ffmpeg');
        
        $builder
            ->setArguments(array('-f', 'lavfi', '-i', 'anullsrc' , '-loop', '1', '-i', $absoluteImagePath, '-c:v', 'libx264', '-t', '15', '-pix_fmt', 'yuv420p', '-vf', 'scale=1920:1080', $path .'/input1.mp4'))
            ->getProcess()
            ->setTimeout(300)
            ->run();
        // At this point we have the calendar video ready
        // We need to retrieve the other video
        $calendar = Calendar::find($request->cal_val);
        
        if($calendar->video != "none"){
            
            // Copy the Calendar video
            file_put_contents($path . "/input2.mp4", fopen("$calendar->video", 'r'));
            
            // Process to generate intermediate video 1
            $builder
            ->setArguments(array('-i', $path . '/input1.mp4', '-c', 'copy', '-bsf:v', 'h264_mp4toannexb', '-f', 'mpegts', $path . '/intermediate1.ts'))
            ->getProcess()
            ->run();
            
            // Process to generate intermediate video 2
            $builder
            ->setArguments(array('-i', $path . '/input2.mp4', '-c', 'copy', '-bsf:v', 'h264_mp4toannexb', '-f', 'mpegts', $path . '/intermediate2.ts'))
            ->getProcess()
            ->run();
            
            // String to concatenate both videos
            $cadena = 'concat:' . $path . '/intermediate1.ts|'. $path . '/intermediate2.ts';
            
            // Process to concatenate both videos
            $builder
            ->setArguments(array())
            ->add('-i')
            ->add($cadena)
            ->add('-c')
            ->add('copy')
            ->add('-bsf:a')
            ->add('aac_adtstoasc')
            ->add($path . '/' . $calendar->name . '.mp4')
            ->getProcess()
            ->run();
            
            // Delete temporary files
            unlink($absoluteImagePath);
            unlink($path . '/input1.mp4');
            unlink($path . '/input2.mp4');
            unlink($path . '/intermediate1.ts');
            unlink($path . '/intermediate2.ts');
            
            $calendarPath = public_path().'/calendars/' . Auth::id();
        
            if (!is_dir($calendarPath)) {
                // dir doesn't exist, make it
                mkdir($calendarPath);
            }
            
            //New name for the video
            $newName = str_replace(" ", "", $calendar->name);
            
            rename($path . '/' . $newName . '.mp4', $calendarPath . '/' . $calendar->name . '.mp4');
            
            return 'El video ha sido generado exitosamente!';
            
        }else{
            // Path to store the generated video
            $calendarPath = public_path().'/calendars/' . Auth::id();
            
            // Create the dir if this doesn't exists
            if (!is_dir($calendarPath)) {
                // dir doesn't exist, make it
                mkdir($calendarPath);
            }
            
            //New name for the video
            $newName = str_replace(" ", "", $calendar->name);
            
            // Delete the video if it exists
            if(file_exists($calendarPath . '/' . $newName . '.mp4')){
                unlink($calendarPath . '/' . $newName . '.mp4');
            }
            
            //Save the image video
            rename($path .'/input1.mp4', $calendarPath . '/' . $newName . '.mp4');
            unlink($absoluteImagePath);
            
            return 'El video ha sido generado exitosamente!';
        }
        
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
    
    public function deleteCalendar($calendar_id, Request $request){
        
        $calendar = Calendar::find($calendar_id);
               
        $message = $calendar->name . ' was successfuly removed.';
                
        $calendar->delete();
        
        if($request->ajax()){
            return $message;
        }
        
    }
    
    /**
     * Save the specified Calendar to storage
     *
     * @param int $calendar_id
     * @param Request $request
     * @return Response
     */
    
    public function saveCalendar(Request $request){
        $calendar = Calendar::find($request->idCal);
        if($calendar->user_id == Auth::id()){
            $calendar->theme = $request->themeCal;
            $calendar->themeC = $request->themeCCal;
            $calendar->layout = $request->layoutCal;
            $calendar->video = $request->videoCal;
            $calendar->content = $request->contentCal;
            if($calendar->save()){
                return "The Calendar have been saved!";
            }
            return "The Calendar could not been saved!";
        }
        
        return "You can not save this Calendar!";
        
    }
    /**
     * Upload the file to the hard drive
     *
     * @param Request $request
     * @return Response
     */
    public function uploadImage(Request $request) {
    
        $file = $request->file;
        if($file){
            $validator = Validator::make($request->all(), [
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            if ($validator->passes()) {
                $path = $request->file('file')->store('images/' . Auth::id(), 'images');
                return $path;
            }else{
                $returnData = array(
                    'message' => 'The file must be a jpg|png|gif|svg image!'
                );
                return response($returnData, 500);
            }
        }else{
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
        
        ini_set('max_execution_time', 300);
        
        $file = $request->file;
        
        if($file){
            $validator = Validator::make($request->all(), [
                'file' => 'required|mimetypes:video/webm,video/quicktime,video/mp4,video/x-flv,video/x-msvideo,video/x-ms-asf,video/x-matroska,video/mpeg,video/ogg',
            ]);
            if ($validator->passes()) {
                
                $userPath = public_path(). '/videos/' . Auth::id();
            
                // Create if not created
                if (!is_dir($userPath)) {
                    // dir doesn't exist, make it
                    mkdir($userPath);
                }
                
                // Upload the file
                $path = $request->file('file')->store('videos/' . Auth::id(), 'images');
                
                // Let´s see if it is a MP4 video
                if(ends_with($path, "mp4") || ends_with($path, "MP4")){
                    
                    // No need to convert video
                    return $path;
                    
                }
                              
                // Generate random name
                $name = substr(md5(microtime()),rand(0,26),7);
                
                // Generate the new URL
                $url = 'videos/' . Auth::id() . "/" . $name . '.mp4';
                
                // Absolute path to store video
                $storePath = public_path().'/videos/' . Auth::id() . "/" . $name . '.mp4';
                                        
                // Absolute path to uploaded video
                $path = public_path(). "/". $path;
                
                    $builder = new ProcessBuilder();
                    $builder->setPrefix('ffmpeg');
                    $builder
                    ->setArguments(array('-i', $path, $storePath, '-hide_banner'))
                    ->getProcess()
                    ->setTimeout(5000)
                    ->run();
                    unlink($path);
                    
                    return $url;
                    
            }else{
                $returnData = array(
                    'message' => 'The file must be a webm, mp4, mov, flv, avi, wmv, mkv, mpeg or ogg video!'
                );
                return response($returnData, 500);
            }
        }else{
            $response_array['status'] = 'error';
            header('Content-type: application/json');
            return json_encode($response_array); 
        }
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        
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
        $calendar->video = 'none';
        $calendar->content = '<div id="imagePrev" class="prueba" style="border: 5px"></div>';
        if($calendar->save()){
            return redirect()->route('editCalendar', ['id' => $calendar->id, 'name' => $calendar->name, 'year' => $calendar->year, 'month' => $calendar->month, 'themeC' => $calendar->themeC, 'theme' => $calendar->theme, 'layout' => $calendar->layout, 'video' => $calendar->video, 'content' => $calendar->content]);
//            return view('home', ['id' => $calendar->id, 'name' => $name, 'year' => $year, 'month' => $month, 'themeC' => $calendar->themeC, 'theme' => $calendar->theme, 'video' => $calendar->video, 'content' => $calendar->content]);
        }
    }
    
    public function editCalendar($calendar_id, Request $request){
        
        $calendar = Calendar::find($calendar_id);
        
        if($calendar){
            if($calendar->user_id == Auth::id()){
                return view('home', ['id' => $calendar->id, 'name' => $calendar->name, 'year' => $calendar->year, 'month' => $calendar->month, 'themeC' => $calendar->themeC, 'theme' => $calendar->theme, 'layout' => $calendar->layout, 'video' => $calendar->video, 'content' => $calendar->content]);
            }
        }
        return redirect()->back();
    }
    
    
    
    /**
     * Show the application Main Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHomePage()
    {   
            return view('pruebas');
    }
    
    public function dashboard()
    {   
        $videosPath = public_path() . '/calendars/' . Auth::id();
        if (!is_dir($videosPath)) {
            // dir doesn't exist, make it
            mkdir($videosPath);
        }
        $files = File::allFiles($videosPath);
        $calendars = Calendar::where('user_id', Auth::id())->get();
        $plans = Subscription::where('user_id', Auth::id())->where('ends_at', null)->get();
        
        return view('dash')->with(['calendars' => $calendars, 'plans' => $plans, 'videos' =>$files]);
    }
    
    function endsWith($haystack, $needle)
    {
        $length = strlen($needle);

        return $length === 0 || (substr($haystack, -$length) === $needle);
}
}
