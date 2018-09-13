<?php
class Welcome_model extends CI_Model{
    public function save_user_info($data) {
        $this->db->insert('users',$data);  
    }
    public function check_user_email($email) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$email);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    public function store_image($data) {
       // $this->db->insert('test_tbl',$data);  
        $this->db->insert('test_tbl',$data);  
    } 
    public function check_view_image(){
         $this->db->select('*');
        $this->db->from('users');
        $query_result=$this->db->get();
        $result=$query_result->result();
        
       // print_r($result);
       // exit();
        return $result;
        }
    public function check_show_image($id){
         $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        
      //  echo '<pre>';
       // print_r($result);
       // exit();
       return $result;
        }
    
}
