<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model {

    public function upload_files($path, $title, $files)
    {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|jpeg|gif|png|txt|doc|docx|xls|xlsx|ppt|pptx|pdf|mp3|mp4',
        );

        $this->load->library('upload', $config);

        $images = array();
        $_FILES['images']['name']= $files['name'];
        $_FILES['images']['type']= $files['type'];
        $_FILES['images']['tmp_name']= $files['tmp_name'];
        $_FILES['images']['error']= $files['error'];
        $_FILES['images']['size']= $files['size'];

        $fileName = $files['name'];

        $images = $fileName;

        $config['file_name'] = $fileName;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('images')) {
            $images = $this->upload->data()['file_name'];
        } else {
            return $this->upload->display_errors();
        }

        return $images;
    }
    public function mupload_files($path, $title, $files)
    {
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'jpg|jpeg|gif|png|txt|doc|docx|xls|xlsx|ppt|pptx|ppt|pptx|pdf|mp3|mp4',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);

        $images = array();

        foreach ($files['name'] as $key => $image) {
            $_FILES['images[]']['name']= $files['name'][$key];
            $_FILES['images[]']['type']= $files['type'][$key];
            $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['images[]']['error']= $files['error'][$key];
            $_FILES['images[]']['size']= $files['size'][$key];

            $fileName = $this->cleaner($image);

            $images[] = $fileName;

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $this->upload->data();
            } else {
                return false;
            }
        }

        return $images;
    }
    public function tinymce_upload()
    {  
      $this->load->helper('url');
       /*******************************************************
       * Only these origins will be allowed to upload images *
       ******************************************************/
      $accepted_origins = array("http://localhost", "http://192.168.1.1", "http://example.com", "http://aipos.id");

      /*********************************************
       * Change this line to set the upload folder *
       *********************************************/
      $imageFolder = 'assets/images/post/';

      reset ($_FILES);
      $temp = current($_FILES);
      if (is_uploaded_file($temp['tmp_name'])){
        header('Access-Control-Allow-Origin: *'); // tambahan
        if (isset($_SERVER['HTTP_ORIGIN'])) {
          // same-origin requests won't set an origin. If the origin is set, it must be valid.
          if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
            //header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
          } else {
            //header("HTTP/1.1 403 Origin Denied");
            //return;
          }
        }

        /*
          If your script needs to receive cookies, set images_upload_credentials : true in
          the configuration and enable the following two headers.
        */
        // header('Access-Control-Allow-Credentials: true');
        // header('P3P: CP="There is no P3P policy."');

        // Sanitize input
        if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
            header("HTTP/1.1 400 Invalid file name.");
            return;
        }

        // Verify extension
        if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
            header("HTTP/1.1 400 Invalid extension.");
            return;
        }
        $filetowrite = $imageFolder . 'tinymce_'. $temp['name'];
        // upload //
        move_uploaded_file($temp['tmp_name'], $filetowrite);
        echo json_encode(array('location' => site_url().$filetowrite));
      } else {
        header("HTTP/1.1 500 Server Error");
      }
    }
    public function clean($string) {
       $string = str_replace(' ', '-', strtolower($string)); // Replaces all spaces with hyphens.
       $r = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
       return str_replace('--','-',$r);

    }
    public function cleaner($string) {
        $r = str_replace(' ','_',$string);
        return str_replace('__','_',$r);
    }

}

/* End of file Upload_model.php */
/* Location: ./application/models/Upload_model.php */