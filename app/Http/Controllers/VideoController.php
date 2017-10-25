<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    //
    public function removeVideo(Request $request){
        
        try{
        
        $calendarID = $request->idVideo;
        
        $calendar = Calendar::find($calendarID);
        
        $video = $calendar->video;
        
        if(ends_with($video, "001.mp4")||ends_with($video, "002.mp4")||ends_with($video, "003.mp4")||
                ends_with($video, "004.mp4")||ends_with($video, "005.mp4")||ends_with($video, "006.mp4")||
                ends_with($video, "007.mp4")||ends_with($video, "008.mp4")||ends_with($video, "009.mp4")||
                ends_with($video, "010.mp4")||ends_with($video, "011.mp4")||ends_with($video, "012.mp4")){
            
                return "El video ha sido eliminado exitosamente!";
            
        }else{
            $videoName = substr("$video", -11);
            
            $videoPath = public_path() . "/videos/" . Auth::id() . "/" . $videoName;
            
            unlink($videoPath);
            
            return "El video ha sido eliminado exitosamente!";
        }
        } catch (Exception $e){
            return $e->getMessage();
        }
        
    }
    
    public function endsWith2($haystack, $needle) {
        
        $lenght = strlen($needle);
        
        return substr($haystack, -$lenght, $lenght) === $needle;

    }

}
