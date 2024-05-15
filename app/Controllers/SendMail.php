<?php 
namespace App\Controllers;
use App\Models\FormModel;
use CodeIgniter\Controller;

class SendMail extends Controller
{
    public function index() 
	{
        return view('form_view');
    }

    function sendMail() { 
        $logger = service('logger');
        
        $request = service('request');
        $session = \Config\Services::session();

        $to = $request->getGet('mailTo');
        $subject = $request->getGet('subject');
        $message = $request->getGet('message');

        $email = \Config\Services::email();

        $email->setTo($to);
        $email->setFrom('infos@rgph.gov.gn', 'Confirm Registration');
        
        $email->setSubject($subject);
        $email->setMessage($message);
        if ($email->send()) 
		{
            echo 'Email successfully sent';
            $logger->error("Email successfully sent");            
        } 
		else
		{
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }
}