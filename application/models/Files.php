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

    public function saveFile($file, $key)
    {
        $this->db->set('file_link', $file)->get_compiled_insert(self::TABLE,FALSE);
        $this->db->set('file_key', $key)->get_compiled_insert();

    }
//    public function do_upload($name)
//    {
//        $config['upload_path']          = './uploads/';
//        $config['allowed_types']        = 'gif|jpg|png';
//        $config['max_size']             = 100;
//        $config['max_width']            = 1024;
//        $config['max_height']           = 768;
//
//        $this->load->library('upload', $config);
//
//        if ( ! $this->upload->do_upload($name))
//        {
//            $error = array('error' => $this->upload->display_errors());
//
//            $this->load->view('upload_form', $error);
//        }
//        else
//        {
//            $data = array('upload_data' => $this->upload->data());
//
//            $this->load->view('upload_success', $data);
//        }
//    }
}