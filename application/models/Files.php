<?php

class Files extends CI_Model
{
    const TABLE = 'files';

    public function getByKey($key)
    {


        $query = $this->db->get_where(self::TABLE, [
            'file_key' => $key
        ]);

        return print_r($query->result());
    }

    public function saveFile($file, $key,$userId =0,$comment='No')
    {
        $currDate = time();
//        $this->db->set('file_link', $file)->get_compiled_insert(self::TABLE,FALSE);
//        $this->db->set('file_key', $key)->get_compiled_insert(self::TABLE,FALSE);
//        $this->db->set('user_id', $userId)->get_compiled_insert(self::TABLE,FALSE);
//        $this->db->set('creation_date', $currDate)->get_compiled_insert(self::TABLE,FALSE);
       // var_dump($file);
        $this->db->query("INSERT INTO `files`(`user_id`, `file_key`,`file_link`,`creation_date`,`comment`) values ($userId,'$key','$file',$currDate,'$comment')");

    }

}