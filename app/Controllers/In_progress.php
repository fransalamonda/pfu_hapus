<?php

namespace App\Controllers;

class In_progress extends BaseController
{
    public function __construct()
    {
        $session = session();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        //  if ($this->request->isAJAX()) {
        // try {
        $view = \Config\Services::renderer();
        $session = session();
        if (!$session->has('nik'))
            throw new \Exception("Session Expired", 2);

        //$id_data = $this->request->getVar('id');
        date_default_timezone_set("Asia/Jakarta");
        //$id_data     = $_POST['id'];
        //$id_data     = $id;

        $this->js_path = "public/assets/js/home/in_progress.js?v=" . date("His");
        //$sidebar_view = "sidebar_" . $_SESSION['groupid'];
        $sidebar_view = "sidebar";
        $this->js_init = "main.init();";
        $data_page = array(
            "username" => 'kk'
        );
        $str = '';
        //$str = return view('pages/content_progres', $data_page);

        $output = [
            "status"        =>  1,
            "iddata"       =>  '',
            // "str"           =>  view('pages/content_progres', $data_page),
            "profile"       =>  $_SESSION['name'],
            'tag_title'     => 'WBI | Patrol Follow Up',
            "sidebar"       =>  $sidebar_view,
            "js_path"       =>  base_url($this->js_path),
            "js_initial"    => "main.init();",
        ];
        //exit(json_encode($output));

        return view('pages/content_progres', $output);
        // } catch (\Exception $exc) {
        //     if ($exc->getCode() == 2)
        //         return redirect()->to('/');
        //     $output = array(
        //         'status'    =>  0,
        //         "msg"       =>  $exc->getMessage(),
        //     );
        //     exit(json_encode($output));
        // }
        // } else {
        //     exit("access denied!");
        // }
    }
}
