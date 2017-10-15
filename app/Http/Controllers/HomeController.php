<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Calendar;
use App\Subscription;
use Validator;
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
            ->setArguments(array('-loop', '1', '-i', $absoluteImagePath, '-c:v', 'libx264', '-t', '15', '-pix_fmt', 'yuv420p', '-vf', 'scale=1920:1080', $path .'/input1.mp4'))
            ->getProcess()
            ->run();

        // At this point we have the calendar video ready
        // We need to retrieve the other video
        $calendar = Calendar::find($request->cal_val);
        
        if($calendar->video != "none"){
            // The calendar does have a video
            $ext = pathinfo($calendar->video, PATHINFO_EXTENSION);
            // Check if it is a MP4 video
            if($ext == "mp4" || $ext == "MP4"){
                // The video is already an MP4
                file_put_contents($path . "/input2.mp4", fopen("$calendar->video", 'r'));
                
            }else{
                // We need to convert to MP4 first
                $stringProcess = $stringProcess . '\n ffmpeg -i ' . $calendar->video .' '. $path.'/input2.mp4 -hide_banner';
//                $process = new Process('ffmpeg -i ' . $calendar->video .' '. $path.'/input2.mp4 -hide_banner');
//                $process->run();
//                while ($process->isRunning()){}
            }
            $cadena = 'concat:' . $path . '/intermediate1.ts|'. $path . '/intermediate2.ts';
            $builder
            ->setArguments(array('-i', $path . '/input1.mp4', '-c', 'copy', '-bsf:v', 'h264_mp4toannexb', '-f', 'mpegts', $path . '/intermediate1.ts'))
            ->getProcess()
            ->run();
            $builder
            ->setArguments(array('-i', $path . '/input2.mp4', '-c', 'copy', '-bsf:v', 'h264_mp4toannexb', '-f', 'mpegts', $path . '/intermediate2.ts'))
            ->getProcess()
            ->run();
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
            
            return $builder->getProcess()->getCommandLine();
            
        }else{
            // The calendar does not have a video
            
        }
        return "Si funcionó";
        
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
        
        $file = $request->file;
        
        if($file){
            $validator = Validator::make($request->all(), [
                'file' => 'required|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,qt,x-msvideo,x-ms-wmv,h264',
            ]);
            if ($validator->passes()) {
                $path = $request->file('file')->store('videos/' . Auth::id(), 'images');
                return $path;
            }else{
                $returnData = array(
                    'message' => 'The file must be a mp4, mov, h264 or wmv video!'
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
        $calendars = Calendar::where('user_id', Auth::id())->get();
        $plans = Subscription::where('user_id', Auth::id())->where('ends_at', null)->get();
        
        return view('dash')->with(['calendars' => $calendars, 'plans' => $plans]);
    }
}
