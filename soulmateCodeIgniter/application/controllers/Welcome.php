
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
          $this->load->helper('security');
    }

    public function index() {
        $this->load->view('soulmate_register');
    }

    public function save_user_registration() {
        $this->load->library('upload');
        $data = array();
        $data['name'] = $this->input->post('name', true);
        $data['email'] = $this->input->post('email', true);
        $data['date_of_birth'] = $this->input->post('date_of_birth', true);
        $data['gender'] = $this->input->post('gender', true);

     $this->load->library('upload', $config);
    $check = getimagesize($_FILES["persion_picture"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['persion_picture']['tmp_name'];
        $imgContent =  base64_encode(file_get_contents($image));
        $data['persion_picture'] =  $imgContent;
    }
       

        $stored_email = $this->Welcome_model->check_user_email($data['email']);

        if ($stored_email->email == $data['email']) {
            $sdata['execption'] = 'This Email Id Already Exist !';
            $this->session->set_userdata($sdata);
        }else{

            if ($_POST['password'] == $_POST['Confirm_Password']) {
                $data['latitude'] = $this->input->post('latitude', true);
                $data['longitude'] = $this->input->post('longitude', true);
               
                $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $data=$this->security->xss_clean($data);
                $this->Welcome_model->save_user_info($data);
                $sdata['message'] = 'Yor Are Registered !';
                $this->session->set_userdata($sdata);
            } else {
                $sdata['execption'] = 'Password Not Match';
                $this->session->set_userdata($sdata);
            }    
            
        }redirect(base_url());
    }
}
