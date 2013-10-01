<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller{
  function __construct(){
    parent::__construct();
  }

  public function getVote(){
    $this->load->database();
    $this->load->model('data_model');
    $index = $this->input->post('index');
    echo json_encode($this->data_model->getVote($index));
  }

  public function getAct($id,$type){
    $this->load->database();
    $this->load->model('data_model');
//    $id = $this->input->post('id');
//    $type = $this->input->post('type');
    echo json_encode($this->data_model->getAct($id,$type));
  }

  public function getOne(){
    $this->load->database();
    $this->load->model('data_model');
    $index = $this->input->post('index');
    echo json_encode($this->data_model->getOne($index));
  }

  public function getOneList(){
    $this->load->database();
    $this->load->model('data_model');
    $index = $this->input->post('index');
    echo json_encode($this->data_model->getOneList($index));
  }

  public function addAct(){
    $this->load->database();
    $this->load->model('data_model');
    $user = $this->input->post('user');
    $invite = $this->input->post('invite');
    $date = $this->input->post('date');
    $Res = $this->input->post('Res');
    $cur = date("Y-m-d/H:i:s");
    $rand = rand();

    $info = array('host_id'=>$user['id'],'confirm_code'=>$rand,'time'=>$date['time'],
      'location'=>$Res,'reg_time'=>$cur,'chosen_date'=>$date['date'][0],
      'chosen_day'=>$date['day'][0],'time_chin'=>$date['time_chin']);
    for($i=0;$i<$invite['num'];$i++){
      $sent_list[$i] = array('id'=>$invite['Id'][$i],'name'=>$invite['name'][$i]); 
    }
    for($i=0;$i<count($date['date']);$i++){
      $sent_date[$i] = array('date'=>$date['date'][$i],'day'=>$date['day'][$i]); 
    }
    $sent = array('info'=>$info,'list'=>$sent_list,'date'=>$sent_date);
    $this->data_model->addOne($sent);
  }
  function editAct(){
    $this->load->database();
    $this->load->model('data_model');
    $desicion = $this->input->post('data');
    $answer = $this->data_model->editAct($desicion);
    echo $answer;
  }
  function addVote(){
    $this->load->database();
    $this->load->model('data_model');
    $vote = $this->input->post('vote');
    $this->data_model->addVote($vote);
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
