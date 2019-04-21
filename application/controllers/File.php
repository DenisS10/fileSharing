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

        //$link = __DIR__ . '../file_dump/';
        // /* $tempName =*/ print_r($_FILES);
        echo '<br>';
        //print_r($tempName);
        echo '<br>';
        $name = md5(time() . rand(1, 1000) . $_FILES['userFile']['name']);
        $ext = explode('.', $_FILES['userFile']['name']);
        //unset($ext[0]);
        $ext = $ext[count($ext) - 1];
        $key = $name[0] . $name[1] . $name[2] . $name[3] . $name[4] . $name[5] . $name[6] . $name[7];

        $pathOld = __DIR__ . '/../file_dump/' . $name[0] . '/' . $name[1];//;
        $path = 
        $link = $path . $name;
        $this->Files->saveFile( $link,$key);
        //echo $_FILES['userFile']['tmp_name'];
        // $this->Files->do_upload('');
        //

//        echo '<pre>';
//        print_r($ext);
//        exit();
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }


//        foreach($_FILES['pictures'] as $picture) {
//
//                $tmp_name = $_FILES['pictures']['tmp_name'][$picture];
//                $name = $_FILES['pictures']['name'][$picture];
//                move_uploaded_file($tmp_name, "$path/$name");
//
//        }


        move_uploaded_file($_FILES['userFile']['tmp_name'], $path . '/' . $name . '.' . $ext);

        //echo $file_key;
        //
        //print_r($res);
        // echo $this->db->set('content', 'My Content')->get_compiled_insert();
        print_r($_POST);
        print_r($_FILES);
    }
}