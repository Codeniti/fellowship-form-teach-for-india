<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('welcome_message');
        $config = array(
            'appId'  => '668200779885451',
            'secret' => '17d4b78cc2eaa7fe78d4948adcf09cd2',
        );
        
        $this->load->library('facebook_api/Facebook', $config);

        $loginUrl = $this->facebook->getLoginUrl(array('redirect_uri' => SERVER_ROOT));
        
        $user_id = $this->facebook->getUser();
        echo '<a href="' . $loginUrl . '">Login</a><br>';
        
        $logoutUrl = 'welcome/logout';
        echo '<a href="' . $logoutUrl . '">Logout</a>';
        
        if($user_id) {
            $user_profile = $this->facebook->api('/me','GET');
            $fql = 'SELECT url FROM square_profile_pic WHERE id = ' . $user_id . ' AND size = 400';
            $image = $this->facebook->api(array(
                'method' => 'fql.query',
                'query' => $fql,
            ));
            print_r($user_profile);    
            print_r($image);
        }
	}
    
    public function logout() {
        $config = array(
            'appId'  => '668200779885451',
            'secret' => '17d4b78cc2eaa7fe78d4948adcf09cd2',
        );
        
        $this->load->library('facebook_api/Facebook', $config);
        
        $this->facebook->destroySession();
        header('Location: ' . SERVER_ROOT);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */