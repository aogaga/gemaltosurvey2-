<?php
/**
 * Created by: Ogaga Agi (aogaga).
 * Github: https://github.com/aogaga
 * Twitter: @aogaga
 * Date: 9/3/18
 * Time: 9:36 AM
 * Project api
 */


namespace App\Http\Controllers;
use App\Entity\Answer;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;

class AnswerController
{
    /**
     * @return a collection of answers
     */
    public function index(){
        return $this->getAllAnswers();
    }

    /**
     * @return a|array
     */
    public function addSurvey(){

     $ans = Input::get('answer');

     $request = new Request();
     $answer = new Answer();
     $answer->answer = $ans;
     $answer->visitorIp  = $this->get_client_ip();;

     if( $answer->save()){
         return $this->getAllAnswers();
     }else{
         return [];
     }


    }


    /**
     * @return a collection of answers
     */
    private function getAllAnswers(){
        return Answer::all()->sortByDesc('created_at')->values();
    }


    /**
     * @return IP address
     */
    function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';

        if($ipaddress == '::1'){
            $ipaddress = '127.0.0.1';
        }

        return $ipaddress;
    }
}