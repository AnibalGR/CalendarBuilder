<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Input;
use App\Calendar;
use App\Subscription;
use Validator;

class HomeController extends Controller
{
    /**
     * Remove the specified resource from storage
     *
     * @param int $calendar_id
     * @param Request $request
     * @return Response
     */
    
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
        $calendar->themeC = 'standard';
        $calendar->theme = '';
        $calendar->video = null;
        $calendar->content = '<div id="imagePrev" class="prueba" style="border: 5px"></div>
                                <div class="panel-body bg-right prueba" >
                                    <div class="panel-body prueba" id="calendarCont" style="overflow: auto">
                                        <p id="topLayout" class="prueba" style="visibility: hidden;  width: 100%; height: 130px; border: 2px solid; z-index: 3">Put your image here!</p>
                                        <p id="leftLayout" class="prueba" style="visibility: hidden;  width: 0px; height: 0px; float: left; margin-bottom: 0px;">Put your image here!</p>
                                        <p id="rightLayout" class="prueba" style="visibility: hidden;  width: 0px; height: 0px; float: right">Put your image here!</p>
                                        <div id="calendar" class="prueba"></div>
                                        <p id="bottomLayout" class="prueba" style="visibility: hidden;  width: 100%; height: 130px; border: 2px solid; z-index: 3">Put your image here!</p>
                                    </div>
                                </div>';
        if($calendar->save()){
            return redirect()->route('editCalendar', ['id' => $calendar->id]);
//            return view('home', ['id' => $calendar->id, 'name' => $name, 'year' => $year, 'month' => $month, 'themeC' => $calendar->themeC, 'theme' => $calendar->theme, 'video' => $calendar->video, 'content' => $calendar->content]);
        }
    }
    
    public function editCalendar($calendar_id, Request $request){
        
        $calendar = Calendar::find($calendar_id);
        
        if($calendar){
            if($calendar->user_id == Auth::id()){
                return view('home', ['id' => $calendar->id, 'name' => $calendar->name, 'year' => $calendar->year, 'month' => $calendar->month, 'themeC' => $calendar->themeC, 'theme' => $calendar->theme, 'video' => $calendar->video, 'content' => $calendar->content]);
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
