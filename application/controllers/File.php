<?php
/**
 * Created by PhpStorm.
 * User: Ден
 * Date: 20.04.2019
 * Time: 14:54
 */

class File extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {

        $this->load->database();
        $this->load->library('upload');
        $this->load->model('Files');
        $this->load->view('header');
        $this->load->view('files/file_sharing_index');
        $this->load->view('footer');
        echo '<pre>';
        $file_key = $this->input->post('file_key');
        //$this->Files->getByKey($file_key);

        $link = __DIR__ . '../../file_dump';
      // /* $tempName =*/ print_r($_FILES);
        echo '<br>';
       //print_r($tempName);
        echo '<br>';
        $key = md5($file_key . rand(0, 1000) . $_FILES['userFile']['name']);
        //echo $key;
       // $this->Files->do_upload('asdasda');
        //$this->Files->saveFile($key,$link);
        move_uploaded_file($_FILES['userFile']['tmp_name'],'../../file_dump'.$_FILES['userFile']['name']);
        //echo $file_key;
        //print_r($res);
        // echo $this->db->set('content', 'My Content')->get_compiled_insert();
        print_r($_POST);
        print_r($_FILES);
    }
}