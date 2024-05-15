<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\UserPrefectureModel;
  
class SigninController extends Controller
{
    public function index()
    {
        helper(['form']);
        echo view('login/signin');
    } 
  
    public function loginAuth()
    {
        $session = \Config\Services::session();
        $userModel = new UserModel();
        $userPrefectures = new UserPrefectureModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('email', $email)->first();
        // $userPrefectures = $userPrefectures->where('user_id', $data->id)->where('etat', 1)->select('id, user_id, prefecture_id')->findAll();
        if($data){            
            $userPrefectures = $userPrefectures->where('user_id', $data->id)->where('etat', 1)->select('id, user_id, prefecture_id')->findAll();
            $pass = $data->password;
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data->id,
                    'name' => $data->name,
                    'email' => $data->email,
                    'user_type' => $data->user_type,
                    'userprefectures' => $userPrefectures,
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);           
                return redirect()->to('/tableau');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/signin');
            }
        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/signin');
        }
    }

    public function signout(){
        session()->destroy();
        return redirect()->to('/');
        // redirect(base_url('/signin'));
    }
    
}