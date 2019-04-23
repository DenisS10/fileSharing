<?php

class Files extends CI_Model
{
    const TABLE = 'files';

    public function getFileByKey($key)
    {

        $this->load->database();
        $query = $this->db->get_where(self::TABLE, [
            'file_key' => $key
        ]);
        if ($query->result() != null)
            return $query->result()[0]->file_link;
        if ($query->result() === null || $query->result() == null)
            return false;
    }

    public function uploadFile($file, $key, $ext, $userId = 0, $comment = 'No')
    {

        $currDate = time();
//        $this->db->set('file_link', $file)->get_compiled_insert(self::TABLE,FALSE);
//        $this->db->set('file_key', $key)->get_compiled_insert(self::TABLE,FALSE);
//        $this->db->set('user_id', $userId)->get_compiled_insert(self::TABLE,FALSE);
//        $this->db->set('creation_date', $currDate)->get_compiled_insert(self::TABLE,FALSE);
        // var_dump($file);
        $this->db->query("INSERT INTO `files`(`user_id`, `file_key`,`file_link`,`extension`,`creation_date`,`comment`) values ($userId,'$key','$file.$ext','$ext',$currDate,'$comment')");

    }

    public function getKey($link)
    {
        $keyT = explode('/file_dump/', $link);
        $keyT = $keyT[count($keyT) - 1];
        // $key = $keyT[3].$keyT[4].$keyT[5].$keyT[6].$keyT[7].$keyT[8].$keyT[9].$keyT[10];
        $key = '';
        for ($i = 10; $i > 2; $i--)
            $key = $keyT[$i] . $key;

//        echo '<br>';
//
//        echo '<br>';
//        echo 'Должно быть так: '.$key;
        return $key;
        // $key =
        //$dn=$this->getByKey($key);
    }

    public function downloadFile($file_key)
    {
        $file_path = $this->getFileByKey($file_key);
        echo $file_path;
//        print_r($file_path);
        if (file_exists($file_path)) {
            // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
            // если этого не сделать файл будет читаться в память полностью!
            if (ob_get_level()) {
                ob_end_clean();
            }
            // заставляем браузер показать окно сохранения файла
            header('Content-Description: File Transfer');
            header('Content-Type: image/jpeg');//Content-Type: image/jpeg;
            header('Content-Disposition: attachment; filename=' . basename($file_path));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file_path));
            // читаем файл и отправляем его пользователю
            readfile($file_path);
        }
    }
}