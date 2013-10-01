<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fgm extends CI_Controller{

  public function __construct(){
    parent ::__construct();
    $this->load->model('fgm_model');
  }

  public function init(){
    $this->load->view('fgm-wiki/header');
    $this->load->view('fgm-wiki/index');
    $this->load->view('fgm-wiki/footer');
  }

  public function editPage(){
    $pagename = $this->input->post('pagename');
    $content  = $this->input->post('content') ;
    $this->fgm_model->editPage($pagename,$content);
  }

  public function loadPage(){
    $pagename = $this->input->post('pagename');
    $content = $this->fgm_model->loadPage($pagename);
    echo $content ;
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
