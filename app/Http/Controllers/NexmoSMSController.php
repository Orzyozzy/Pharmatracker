<?php
namespace App\Http\Controllers;
   

use Illuminate\Http\Request;
use App\Notifications\CustomSmsNotification;
use App\Models\User;

use Exception;

  
class NexmoSMSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */

     
    public function backup(){
       
    }

    public function index(Request $request)
    {
        try {
            
      

            $basic  = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"), getenv("NEXMO_SECRET"));
            $client = new \Nexmo\Client($basic);
  
            $receiverNumber = "+639487393311";
            $message = "This is testing from ItSolutionStuff.com";
  
            $message = $client->message()->send([
                                
                'to' => $receiverNumber,
                'from' => 'Vonage APIs',
                'text' => $message
            ]);
  
            dd('SMS Sent Successfully.');
              
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }
}