<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
set_include_path(APPPATH . 'third_party/' . PATH_SEPARATOR . get_include_path());

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    private $_gp_client;
    private $_gp_plus;
    private $_gp_moment;
    private $_gp_plusItemScope;

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('googleplus');
        $this->_gp_client = $this->googleplus->client;
        $this->_gp_plus = $this->googleplus->plus;
        $this->_gp_moment = $this->googleplus->moment;
        $this->_gp_plusItemScope = $this->googleplus->plusItemScope;
    }

    public function index() {
        if ($this->input->get_post('code')) {
            try {

                $this->_gp_client->authenticate($this->input->get_post('code'));
                $access_token = $this->_gp_client->getAccessToken();
                $this->session->set_userdata('access_token', $access_token);
                redirect('/welcome/me');
            } catch (Google_Auth_Exception $e) {
                print_r($e);
            }
        } else {

            try {
                echo anchor($this->_gp_client->createAuthUrl(), 'Conect Me');
            } catch (Google_Auth_Exception $e) {
                _print($e);
            }
        }

        #$this->load->view('welcome_message');
    }

    public function me() {
        try {
            $this->_gp_client->setAccessToken($this->session->userdata('access_token'));
            $response = $this->_gp_plus->people->get('me');
            #print_R($response);
            $this->_gp_plusItemScope->setId($response->id);
            $this->_gp_plusItemScope->setType("http://schema.org/AddAction");
            $this->_gp_plusItemScope->setName("The Google+ Platform");
            $this->_gp_plusItemScope->setDescription("A page that describes just how awesome Google+ is!");
            $this->_gp_plusItemScope->setImage("https://developers.google.com/+/plugins/snippet/examples/thing.png");

            #$this->_gp_plusItemScope->setImage($post_data['post_attachment']);
            $this->_gp_moment->setTarget($this->_gp_plusItemScope);
            $this->_gp_moment->setType("http://schemas.google.com/AddActivity");

            $momentResult = $this->_gp_plus->moments->insert('me', 'vault', $this->_gp_moment);
            print_R($momentResult);
        } catch (Google_Auth_Exception $e) {
            print_r($e);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */