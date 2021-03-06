<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Home extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Halte_model');
        $this->load->model('Jalur_model');
        $this->load->model('Rute_model');
        
    }

    function index()
    {
        $rute_code=1;
        $rute = $this->input->get('rute');
        if($rute){
           $rute_code=$rute;
        }
        $data['API_KEY'] = 'AIzaSyD4t7gswU3FNvMVIDCMbXwdRmqih5INwb0';
        $data['halte'] =$this->Jalur_model->get_jalur_by_rute($rute_code);//$this->Halte_model->get_all();
        $data['waypoints']=$this->Jalur_model->get_way_point($rute_code);
        $data['transit']=$this->Jalur_model->get_transit($rute_code);
        $data['rute']=$this->Rute_model->get_all_rute();
        $data['rute_detail']=$this->Rute_model->get_rute($rute_code);
        $data['selected_rute']=$rute_code;
        $this->load->view('layouts/home3',$data);
    }

    function GET_ALL(){
        $data['rute']=$this->Rute_model->get_all_rute();
        $data['halte'] =$this->Jalur_model->get_halte_all();
        foreach ($data['rute'] as $key => $value) {
             //$data['rute'][$key]["halte"]=$this->Jalur_model->get_jalur_by_rute($data['rute'][$key]['id']);
             $data['rute'][$key]["waypoints"]=$this->Jalur_model->get_way_point($data['rute'][$key]['id']);
             $data['rute'][$key]["transit"]=$this->Jalur_model->get_transit($data['rute'][$key]['id']);
             //print_r($data['rute'][$key]);
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                    'success' => true,
                    'data' => $data
            )));
    }


}
