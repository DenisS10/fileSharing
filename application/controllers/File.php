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
        $this->load->view('header');
        $this->load->view('files/file_sharing_index');
        $this->load->view('footer');
        $this->load->database();
        $this->load->library('upload');
        $this->load->library('session');
        $this->load->model('Files');

        $name = md5(time() . rand(1, 1000) . $_FILES['userFile']['name']);
        $key = $name[0] . $name[1] . $name[2] . $name[3] . $name[4] . $name[5] . $name[6] . $name[7];
        $this->session->keyLink = $key;

        // echo '<pre>';
        //$file_key = $this->input->post('file_key');
        // print_r($_FILES);
//      print_r($_POST);
        if (!isset($_FILES['userFile']['name'])) {
            echo '!ok';
            exit();
        }

        $ext = explode('.', $_FILES['userFile']['name']);
        //unset($ext[0]);
        $ext = $ext[count($ext) - 1];


        $pathOld = __DIR__ . '/../file_dump/' . $name[0] . '/' . $name[1];//;
        $path = str_replace('\\', '/', $pathOld);
        // print_r( $ext);
        $link = $path . $name;
        $this->Files->uploadFile($link, $key, $ext);

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        if (!isset($_FILES['userFile']['tmp_name'])) {
            header('location: index');
            exit();
        }
        move_uploaded_file($_FILES['userFile']['tmp_name'], $path . '/' . $name . '.' . $ext);

    }

    public function upload($file, $key)
    {

    }

    public function download()
    {



        //  $key = $this->session->keyLink;
        //  $this->Files->getByKey($key);
        //$downloadLink='http://task.by/index.php/File/download/' . $key;
        $this->load->view('header');
        $this->load->view('files/file_download');
        $this->load->view('footer');
        $this->load->model('Files');

        $link = 'E:/OpenServer/OSPanel/domains/fileSharing/application/controllers/../file_dump/1/e1e7077e05f1066d28d4c9a9f5d86bbed';
        echo '<pre>';
        $fileKey=$this->Files->getKey($link);
        echo $fileKey;
        $this->Files->downloadFile($fileKey);



    }
//    function file_force_download($file) {
//        if (file_exists($file)) {
//            // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
//            // если этого не сделать файл будет читаться в память полностью!
//            if (ob_get_level()) {
//                ob_end_clean();
//            }
//            // заставляем браузер показать окно сохранения файла
//            header('Content-Description: File Transfer');
//            header('Content-Type: application/octet-stream');
//            header('Content-Disposition: attachment; filename=' . basename($file));
//            header('Content-Transfer-Encoding: binary');
//            header('Expires: 0');
//            header('Cache-Control: must-revalidate');
//            header('Pragma: public');
//            header('Content-Length: ' . filesize($file));
//            // читаем файл и отправляем его пользователю
//            readfile($file);
//            exit;
//        }
//    }
}