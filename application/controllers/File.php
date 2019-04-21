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
        $this->load->library('session');
        $this->load->model('Files');
        $this->load->view('header');
        $this->load->view('files/file_sharing_index');
        $this->load->view('footer');
        echo '<pre>';
        $file_key = $this->input->post('file_key');

        $name = md5(time() . rand(1, 1000) . $_FILES['userFile']['name']);
        $ext = explode('.', $_FILES['userFile']['name']);
        //unset($ext[0]);
        $ext = $ext[count($ext) - 1];
        $key = $name[0] . $name[1] . $name[2] . $name[3] . $name[4] . $name[5] . $name[6] . $name[7];
        $this->session->keyLink = $key;
        $pathOld = __DIR__ . '/../file_dump/' . $name[0] . '/' . $name[1];//;
        $path = str_replace('\\', '/', $pathOld);

        $link = $path . $name;
        $this->Files->saveFile($link, $key);

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }


        move_uploaded_file($_FILES['userFile']['tmp_name'], $path . '/' . $name . '.' . $ext);

    }

    public function download()
    {
        $key = $this->session->keyLink;
        $this->Files->getByKey($key);
        //$downloadLink='http://task.by/index.php/File/download/' . $key;
        $this->load->view('header');
        $this->load->view('file_download');
        $this->load->view('footer');
    }
}