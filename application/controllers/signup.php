<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function index() {
        
        $config = array(
            'appId'  => '668200779885451',
            'secret' => '17d4b78cc2eaa7fe78d4948adcf09cd2',
        );
        
        $this->load->library('facebook_api/Facebook', $config);
		$this->load->database();
        
        $facebookId = $this->facebook->getUser();
        
        if($this->input->post('facebook_login') != null) {
            
            $facebookId = $this->facebook->getUser();
            if(isset($facebookId)) {
                $fql = 'SELECT email, first_name, last_name FROM user WHERE uid = ' . $facebookId;
                $user_profile = $this->facebook->api(array(
                    'method' => 'fql.query',
                    'query' => $fql,
                ));
                $user_profile = $user_profile[0];
                
                $email = $user_profile['email'];
                
                // Check if exists
                
                $sql = 'SELECT * FROM gendata WHERE email=?';
                $query = $this->db->query($sql, array($email));
                
                if($query->num_rows() > 0) {
                    
                    // He exists
                    echo 'He exists<br>';
                    
                } else {
                
                    // Insert
                    $name = $user_profile['first_name'] . ' ' . $user_profile['last_name'];
                    $prof = $this->input->post('prof', TRUE);
                    $pwd = '';
                    $sql = 'INSERT INTO gendata (name, email, prof, pwd) VALUES(?, ?, ?, ?)';
                    $query = $this->db->query($sql, array($name, $email, $prof, $pwd));
                    
                }
                
            
            } else {
            
                // Error
                echo 'ERROR<br>';
            
            }
            
        } else if($this->input->post('signup', TRUE) != null) {
        
            $email = $this->input->post('email', TRUE);
            $password = $this->input->post('password', TRUE);
            $name = $this->input->post('name', TRUE);
            $prof = $this->input->post('prof', TRUE);
            
            if(!isset($email) || !isset($password)) {
            
                // ERROR
                echo 'ERROR<br>';
            
            } else {
            
                // Get User Info and save to database if does not exist already
                
                $sql = 'SELECT * FROM gendata WHERE email=?';
                $query = $this->db->query($sql, array($email));
                
                if($query->num_rows() > 0) {
                    print_r($query);
                    // He exists
                    echo 'Exists<br>';    
                    
                } else {
                
                    // Insert
                    $name = $user_profile['first_name'] . ' ' . $user_profile['last_name'];
                    $prof = $this->input->post('prof', TRUE);
                    $pwd = '';
                    $sql = 'INSERT INTO gendata (name, email, prof, pwd) VALUES(?, ?, ?, ?)';
                    $query = $this->db->query($sql, array($name, $email, $prof, $pwd));
                    echo 'INSERTED';
                }
            
            }
        
        } else {
            $this->load->view('signup_a');
        }
        
        
    }
    
    public function signup_a() {
        
        
        
    }
    
    
    
}
