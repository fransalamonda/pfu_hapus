<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function __construct()
    {
        //$this->load->library('form_validation');
        //$session = session();
        $this->db = \Config\Database::connect();
        //$this->encrypter = \Config\Services::encrypter();
    }

    public function index()
    {
        return view('welcome_message');
    }
    public function beranda()
    {
        try {

            $session = session();
            if (!$session->has('nik'))
                throw new \Exception("Session Expired", 2);

            date_default_timezone_set("Asia/Jakarta");
            $nik     = $_SESSION['nik'];
            $name = $_SESSION['name'];
            //$name   = $_SESSION['name'];

            // $sql = "SELECT * FROM tbl_user WHERE id=?";
            // $bind = array($id);
            // $list_data = $db->query($sql, $bind);

            //$this->js_path = "public/assets/js/home/home_WBI.js?v=" . date("His");
            $this->js_path = "public/assets/js/home/home_WBI_" . $_SESSION['app_role_id'] . ".js?v=" . date("His");
            //$sidebar_view = "sidebar_" . $_SESSION['groupid'];
            $sidebar_view = "sidebar";
            $this->js_init = "main.init();";

            $data_page = [
                "profile"       =>  $_SESSION['name'],
                'tag_title'     => 'WBI | Patrol Follow Up',
                "sidebar"       =>  $sidebar_view,
                // "js_initial"    => "login.init();",
                "js_path"       =>  base_url($this->js_path),
                //"js_init"       =>  $this->js_init,
                "js_initial"    => "main.init();",
            ];
            return view('pages/content', $data_page);
        } catch (\Exception $exc) {
            if ($exc->getCode() == 2)
                return redirect()->to('/');
            //return redirect()->route('Home/login');
            //redirect("Welcome?err=session_expired");
            //else
            //show_error($exc->getMessage(), 500, "Error");
            $output = array(
                'status'    =>  0,
                "msg"       =>  $exc->getMessage(),
            );
            exit(json_encode($output));
        }
    }
    public function condition()
    {
        try {

            $session = session();
            if (!$session->has('nik'))
                throw new \Exception("Session Expired", 2);

            date_default_timezone_set("Asia/Jakarta");
            $nik     = $_SESSION['nik'];
            $name = $_SESSION['name'];
            //$name   = $_SESSION['name'];

            // $sql = "SELECT * FROM tbl_user WHERE id=?";
            // $bind = array($id);
            // $list_data = $db->query($sql, $bind);

            $this->js_path = "public/assets/js/home/home_WBI.js?v=" . date("His");
            $sidebar_view = "sidebar";
            $this->js_init = "main.init();";

            $data_page = [
                "profile"       =>  $_SESSION['name'],
                'tag_title'     => 'WBI | Patrol Follow Up',
                "sidebar"       =>  $sidebar_view,
                // "js_initial"    => "login.init();",
                "js_path"       =>  base_url($this->js_path),
                //"js_init"       =>  $this->js_init,
                "js_initial"    => "main.init();",
            ];
            return view('pages/content', $data_page);
        } catch (\Exception $exc) {
            if ($exc->getCode() == 2)
                return redirect()->to('/');
            //return redirect()->route('Home/login');
            //redirect("Welcome?err=session_expired");
            //else
            //show_error($exc->getMessage(), 500, "Error");
            $output = array(
                'status'    =>  0,
                "msg"       =>  $exc->getMessage(),
            );
            exit(json_encode($output));
        }
    }
    public function login()
    {
        $data = [
            'title' => 'Login',
            "js_initial"    => "login.init();",
            'tag_title'     => 'WBI | Patrol Follow Up',
        ];
        helper(['form']);

        return view('pages/login', $data);
    }
    function login_act()
    {

        if ($this->request->isAJAX()) {
            try {
                $validation =  \Config\Services::validation();
                $db = \Config\Database::connect();
                $this->db2 = \Config\Database::connect("two_db"); // Loads OtherDb group

                $session = session();

                $valid = $this->validate([
                    'userid' => ['rules' => 'required', 'label' => 'ID', 'errors' => ['required' => 'Rules.username.required',]]
                ]);
                if (!$valid) {
                    $msg = [
                        'errors' => [
                            'errorID' => $validation->getError('userid')
                        ]
                    ];
                }
                date_default_timezone_set("Asia/Jakarta");
                $current_date_time = date("Y-m-d H:i:s");
                $agent   = $this->request->getUserAgent();

                $userid = $this->request->getVar('userid');
                $pass = $this->request->getVar('pass');
                $app_key = 'w71Y9wTLfRTIj1fsRnRX';
                $browser = $agent->getBrowser();

                $data = [
                    'nik' => $userid,
                    'password' => $pass,
                    'app_key' => $app_key,
                ];

                $cache_data = $userid . "_" . $pass;
                /* 
                 * +++++++++++++++++++++++++++++++++++++++++++++
                 * CEK DATA CACHE DI SERVER REDIS - START
                 * +++++++++++++++++++++++++++++++++++++++++++++
                 */
                if (!$respon_data = cache($cache_data)) {
                    $url = 'https://report-id.online/dais_sso_new/public/api/login';
                    $curl = curl_init($url);
                    $hasil0 = curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    $hasil = curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $response_api = curl_exec($curl);
                    $jsonData = json_decode($response_api, true);
                    $respon_login = $jsonData['success'];
                    if ($respon_login == false) {
                        $output = array(
                            'status'    =>  0,
                            "msg"       =>  $jsonData['message'],
                        );
                        exit(json_encode($output));
                    }
                    $respon_data = $jsonData['user'];
                    cache()->save($cache_data, $respon_data, 1200); //300 = 5 minute
                    curl_close($curl);
                }

                //POST API LOGIN - START

                /* 
                 * +++++++++++++++++++++++++++++++++++++++++++++
                 * CEK DATA CACHE REDIS - END
                 * +++++++++++++++++++++++++++++++++++++++++++++
                 */
                $ses_data = [
                    'app_key'           => $respon_data['app_key'],
                    'nik'               => $respon_data['nik'],
                    'name'              => $respon_data['name'],
                    'email'             => $respon_data['email'],
                    "app_role_id"       => $respon_data['app_role_id'],
                    "role_display_name" => $respon_data['role_display_name'],

                ];
                $session->set($ses_data);

                // //POST API LOGIN - END
                // $data_log = [
                //     'nik' => $userid,
                //     'name' => $jsonData['user']['name'],
                //     'browser' => $browser,
                //     'app_key' => $app_key,
                // ];
                // $url_log = 'http://localhost/api_wbi/api_data/login_log';
                // $curlog = curl_init($url_log);
                // $hasil_log = curl_setopt($curlog, CURLOPT_POSTFIELDS, $data_log);
                // $hasil_log1 = curl_setopt($curlog, CURLOPT_RETURNTRANSFER, true);
                // $response_api_log = curl_exec($curlog);
                // $jsonData_log = json_decode($response_api_log, true);
                // $respon_login_log = $jsonData_log['success'];
                // if ($respon_login_log == false) {
                //     $output = array(
                //         'status'    =>  0,
                //         "msg"       =>  $jsonData_log['pesan'],
                //     );
                //     exit(json_encode($output));
                // }
                // curl_close($curlog);

                $output = array(
                    "status"    =>  1,
                    "msg"       =>  "You logged in",
                    "data" => $ses_data,
                );
                exit(json_encode($output));
            } catch (\Exception $e) {
                $output = array(
                    'status'    =>  0,
                    "msg"       =>  $e->getMessage(),
                );
                exit(json_encode($output));
            }
        } else {
            echo "denied";
        }
    }
    /*
     * list_action 
     * author :  FSM
     * date : 14 Jul 2022
     */

    function list_action()
    {
        if ($this->request->isAJAX()) {
            try {
                $session = session();
                //$encrypter = \Config\Services::encrypter();
                $validation =  \Config\Services::validation();

                if (!$session->has('nik'))
                    throw new \Exception("Session Expired", 2);
                session_write_close();
                $valid = $this->validate(['id' => ['rules' => 'required', 'label' => 'ID', 'errors' => ['required' => 'Rules.id.required',]]]);
                if (!$valid) {
                    $msg = ['errors' => ['errorID' => $validation->getError('id')]];
                }
                $str1 = '';
                if (!$respon_data = cache('list_data')) {

                    $id = '03301393';
                    $app_key = 'w71Y9wTLfRTIj1fsRnRX';

                    $data = [
                        'id' => $id,
                        'app_key' => $app_key,
                    ];
                    $url = 'http://localhost/api_wbi/api_data/list_data';
                    $curl = curl_init($url);
                    $hasil0 = curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    $hasil = curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    $response_api = curl_exec($curl);
                    $jsonData = json_decode($response_api, true);
                    $respon_login = $jsonData['success'];
                    if ($respon_login == false) {
                        $output = array(
                            'status'    =>  0,
                            "msg"       =>  $jsonData['message'],
                        );
                        exit(json_encode($output));
                    }

                    $respon_data = $jsonData['data'];
                    curl_close($curl);
                    cache()->save('list_data', $respon_data, 150); //2.5 menit
                }
                foreach ($respon_data as $item) {
                    $encrypted_id = "wbi-" . $item['Equipment_ID'];
                    $tmped = "class='btn btn-xs btn-outline-info waves-purple waves-light btnRes' data-id='" . $encrypted_id . "'";
                    $Inspection_Date = $item['Inspection_Date'];
                    $newDate = date("d/m/Y", strtotime($Inspection_Date));
                    $str1 .= "<tr class='table-active' >";
                    $str1 .= "<td  class='text Column content' title=' ' >
                    <button class='btn btn-danger waves-effect waves-light kotak-satu' ></button>
                    <button class='btn btn-purple waves-effect waves-light kotak-dua' ></button>
                    <button class='btn btn-warning waves-effect waves-light kotak-tiga' ></button>
                    </td>";
                    $str1 .= "<td  class='text' title=''>" . $item['Equipment_ID'] . "</td>";
                    $str1 .= "<td  class='text' title=''>" . $newDate . "</td>";
                    $str1 .= "<td  class='text' title=''>" . $item['Condition'] . "</td>";
                    $str1 .= "<td  class='text' title=''></td>";
                    $str1 .= "<td  class=''><a href='javascript:void(0)' " . $tmped . " title='Open Case'><h7 class='mt-3 mb-0 ' ><small></small>Open Detail</h7></a></td>";
                    $str1 .= "</tr>";
                }
                $not_started = "Unresolved (" . count($respon_data) . ")";
                $cases_action = "<b>3</> cases waiting for your action";

                $response = array(
                    "status"    => 1,
                    "csrf_hash"     => csrf_hash(),
                    "str"           => $str1,
                    "not_started"    => $not_started,
                    "not_action"    => $cases_action,
                );



                exit(json_encode($response));
            } catch (\Exception $exc) {
                $json_data = array(
                    "status"    => 0,
                    //"csrf_hash" => $this->security->get_csrf_hash(),
                    "csrf_hash" => csrf_hash(),
                    "msg"       => $exc->getMessage(),
                );
                exit(json_encode($json_data));
            }
        } else die("Die!");
    }

    function open_detail()
    {
        if ($this->request->isAJAX()) {
            try {
                $session = session();
                //$encrypter = \Config\Services::encrypter();
                $validation =  \Config\Services::validation();

                if (!$session->has('nik'))
                    throw new \Exception("Session Expired", 2);
                session_write_close();
                $valid = $this->validate(['id' => ['rules' => 'required', 'label' => 'ID', 'errors' => ['required' => 'Rules.id.required',]]]);
                if (!$valid) {
                    $msg = ['errors' => ['errorID' => $validation->getError('id')]];
                }


                $id = '03301393';
                $app_key = 'w71Y9wTLfRTIj1fsRnRX';

                $data = [
                    'id' => $id,
                    'app_key' => $app_key,
                ];
                $url = 'http://localhost/api_wbi/api_data/open_detail';
                $curl = curl_init($url);
                $hasil0 = curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                $hasil = curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $response_api = curl_exec($curl);
                $jsonData = json_decode($response_api, true);
                $respon_login = $jsonData['success'];
                if ($respon_login == false) {
                    $output = array(
                        'status'    =>  0,
                        "msg"       =>  $jsonData['message'],
                    );
                    exit(json_encode($output));
                }
                $str = '';
                $equipmentcode = '561_FN1';
                $waitingcase = '';
                $respon_data = $jsonData['data'];
                foreach ($respon_data as $item) {

                    $originalDate = $item['schedule_updated_date'];
                    $newDate = date("d/m/Y", strtotime($originalDate));
                    //$idcomb = "wbi-" . $item['schedule_id'];
                    $encrypted_id = "wbi-" . $item['schedule_id'];
                    //$equipmentcode =  $v->section_id;
                    $tmped = "class='btn btn-xs btn-outline-info waves-purple waves-light btnCase' data-id='" . $encrypted_id . "'";
                    $str .= "<tr class='table-active' >";
                    $str .= "<td  class='text Column content' title=' ' >
                    </td>";
                    $str .= "<td  class='text' title=''>" . $newDate . "</td>";
                    $str .= "<td  class='text ' title=''>" . $item['eq_erp_id'] . "</td>";
                    $str .= "<td  class='text' title=''></td>";

                    $str .= "<td class='text-right'></td>";
                    //$str .= "<td  class='text' title=''></td>";
                    $str .= "<td  class=''><a href='javascript:void(0)' " . $tmped . " title='Open Case'><h7 class='mt-3 mb-0 ' ><small></small>Open Case</h7></a></td>";
                    $str .= "</tr>";
                }
                $not_started = "Unresolved (" . count($respon_data) . ")";
                $cases_action = "<b>3</> cases waiting for your action";
                curl_close($curl);
                $angka = 3;
                $waitingcase = "<b>" . $angka . "</b> cases waiting for your action";
                $response = array(
                    "status"    => 1,
                    "csrf_hash"     => csrf_hash(),
                    "str"           => $str,
                    "eq_code"       => $equipmentcode,
                    "waitingcase"       => $waitingcase,
                );

                //list Data

                exit(json_encode($response));
            } catch (\Exception $exc) {
                $json_data = array(
                    "status"    => 0,
                    //"csrf_hash" => $this->security->get_csrf_hash(),
                    "csrf_hash" => csrf_hash(),
                    "msg"       => $exc->getMessage(),
                );
                exit(json_encode($json_data));
            }
        } else die("Die!");
    }
    /*
     * view action 
     * author :  FSM
     * date : 14 Jul 2022
     */
    function view_action()
    {
        if ($this->request->isAJAX()) {
            try {
                $session = session();
                $validation =  \Config\Services::validation();
                if (!$session->has('nik'))
                    throw new \Exception("Session Expired", 2);
                session_write_close();
                $valid = $this->validate(['id' => ['rules' => 'required', 'label' => 'ID', 'errors' => ['required' => 'Rules.id.required',]]]);
                if (!$valid) {
                    $msg = ['errors' => ['errorID' => $validation->getError('id')]];
                }
                $idcomb = $this->request->getVar('id');
                $tmp = explode('-', $idcomb);
                if (count($tmp) != 2)
                    throw new \Exception("Invalid ID #1");
                $kate_id = $tmp[0];
                $id = $tmp[1];
                if (!is_numeric($id))
                    throw new \Exception("Invalid ID");

                $current_date_time = date("Y-m-d");
                $cache_dept = $current_date_time . "_dept";
                //list Dept
                if (!$respon_data = cache($cache_dept)) {
                    $app_key = 'w71Y9wTLfRTIj1fsRnRX';
                    $data = [
                        'app_key' => $app_key,
                    ];
                    $url_dept = 'http://localhost/api_wbi/api_data/departemen';
                    $curl_dept = curl_init($url_dept);
                    curl_setopt($curl_dept, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($curl_dept, CURLOPT_RETURNTRANSFER, true);
                    $response_api_dept = curl_exec($curl_dept);
                    $jsonData_dept = json_decode($response_api_dept, true);
                    $respon_dept = $jsonData_dept['success'];
                    if ($respon_dept == false) {
                        $output = array(
                            'status'    =>  0,
                            "msg"       =>  $jsonData_dept['message'],
                        );
                        exit(json_encode($output));
                    }
                    $respon_data = $jsonData_dept['data_status'];
                    //$respon_data_s = $jsonData_dept['data_status'];
                    curl_close($curl_dept);
                    cache()->save($cache_dept, $respon_data, 30000);
                }
                $str_dept = "<option value=''> - Choose - </option>";
                foreach ($respon_data['plant'] as $d) {
                    $str_dept .= "<option value='" . $d['plant_id'] . "'>";
                    $str_dept .= $d['plant_name'] . "</option>";
                }

                //list status
                $str_status = "<option value=''> - Choose - </option>";
                foreach ($respon_data['status'] as $s) {
                    $str_status .= "<option value='" . $s['status_id'] . "'>";
                    $str_status .= $s['status_name'] . "</option>";
                }

                // $sql_status = "SELECT A.* FROM master_status A WHERE 1=1 ";
                // $list_status = $this->db->query($sql_status);
                // $str_status = "<option value=''> - Choose - </option>";
                // foreach ($list_status->getResult() as $v) {
                //     $str_status .= "<option value='" . $v->status_id . "'>";
                //     $str_status .= $v->status_name . "</option>";
                // }



                $response = array(
                    "status"    => 1,
                    "csrf_hash" => csrf_hash(),
                    "str_dept" => $str_dept,
                    "str_status" => $str_status,
                    // "str"       => $str,
                    // "not_started"    => $not_started,
                    //"not_action"    => $cases_action,
                    //"Equipment_Code"    => $Equipment_Code,
                );
                exit(json_encode($response));
            } catch (\Exception $exc) {
                $json_data = array(
                    "status"    => 0,
                    //"csrf_hash" => $this->security->get_csrf_hash(),
                    "csrf_hash" => csrf_hash(),
                    "msg"       => $exc->getMessage(),
                );
                exit(json_encode($json_data));
            }
        } else die("Die!");
    }


    function listbackup()
    {
        if ($this->request->isAJAX()) {
            try {
                $session = session();
                //$encrypter = \Config\Services::encrypter();
                $validation =  \Config\Services::validation();

                if (!$session->has('nik'))
                    throw new \Exception("Session Expired", 2);
                session_write_close();
                $valid = $this->validate(['id' => ['rules' => 'required', 'label' => 'ID', 'errors' => ['required' => 'Rules.id.required',]]]);
                if (!$valid) {
                    $msg = ['errors' => ['errorID' => $validation->getError('id')]];
                }


                // $nik = '03301393';
                // $password = '123456';
                // $app_key = 'w71Y9wTLfRTIj1fsRnRX';

                // $data = [
                //     'nik' => $nik,
                //     'password' => $password,
                //     'app_key' => $app_key,
                // ];
                // $url = 'https://report-id.online/dais_sso_new/public/api/login';
                // $curl = curl_init($url);
                // $hasil0 = curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                // $hasil = curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                // $response_api = curl_exec($curl);

                // $jsonData = json_decode($response_api, true);


                // $duser = $jsonData['user']['nik'];

                //list Data

                $id = $this->request->getVar('id');
                if ($id == '')
                    $sql = "SELECT CM.*, MC.`checkpoint_name`, CL.checklist_desc
                    FROM checklist_mapping CM
                    LEFT JOIN `master_checkpoint` MC ON CM.`checkpoint_id`=MC.`checkpoint_id`
                    LEFT JOIN `master_checklist` CL ON CM.checklist_id=CL.checklist_id
                    WHERE 1=1
                     LIMIT 5";
                else
                    $sql = "SELECT CM.*, MC.`checkpoint_name`, CL.checklist_desc
                    FROM checklist_mapping CM
                    LEFT JOIN `master_checkpoint` MC ON CM.`checkpoint_id`=MC.`checkpoint_id`
                    LEFT JOIN `master_checklist` CL ON CM.checklist_id=CL.checklist_id
                    WHERE 1=1 
                    LIMIT 3";

                $list_data = $this->db->query($sql);
                if (!$list_data) {
                    $msg = $_SESSION['id'] . " " . $this->router->fetch_class() . " : " . $this->db->error()["message"];
                    $msg = '1';
                    log_message("error1", $msg);
                    throw new \Exception("Invalid SQL!");
                }
                if ($list_data->resultID->num_rows == 0)
                    $str = "<tr><td colspan='8'>Data tidak ditemukan</td></tr>";

                $no = 1;
                $str = '';
                // $not_started = "Not Started (5)";
                $not_started = "Not Started (" . $list_data->resultID->num_rows . ")";
                $cases_action = "<b>3</> cases waiting for your action";
                foreach ($list_data->getResult() as $v) {
                    $originalDate = $v->updated_date;
                    $newDate = date("d/m/Y", strtotime($originalDate));


                    $idcomb = "wbi-" . $v->mapping_id;
                    $encrypted_id = "wbi-" . $v->mapping_id;
                    //$encrypted_id = base64_encode(openssl_encrypt($idcomb, "AES-128-ECB", ENCRYPT_PASS));
                    //$encrypted_id = $encrypter->encrypt($idcomb);

                    $tmped = "class='btn btn-xs btn-outline-info waves-purple waves-light btnRes' data-id='" . $encrypted_id . "'";

                    $str .= "<tr class='table-active' >";
                    // $str .= "<td  class='text' title=' ' ><p class='badge badge-warning'>" . $v->section_id . "</p></td>";
                    $str .= "<td  class='text Column content' title=' ' ><button type='button' class='btn btn-pink btn-xs' disabled=''>" . $v->section_id . "</button> </td>";
                    $str .= "<td  class='text' title=''>" . $newDate . "</td>";
                    $str .= "<td  class='text ' title=''>" . $v->eq_erp_id . "</td>";
                    $str .= "<td  class='text' title=''>" . $v->checkpoint_name . "</td>";

                    $str .= "<td class='text-right'></td>";
                    //$str .= "<td  class='text' title=''></td>";
                    $str .= "<td  class=''><a href='javascript:void(0)' " . $tmped . " title='Open Case'><h7 class='mt-3 mb-0 ' ><small></small>Open Case</h7></a></td>";
                    $str .= "</tr>";
                }
                //curl_close($curl);
                $response = array(
                    "status"    => 1,
                    "csrf_hash" => csrf_hash(),
                    "str"       => $str,
                    "not_started"    => $not_started,
                    "not_action"    => $cases_action,
                );
                exit(json_encode($response));
            } catch (\Exception $exc) {
                $json_data = array(
                    "status"    => 0,
                    //"csrf_hash" => $this->security->get_csrf_hash(),
                    "csrf_hash" => csrf_hash(),
                    "msg"       => $exc->getMessage(),
                );
                exit(json_encode($json_data));
            }
        } else die("Die!");
    }
    function list_action_backup()
    {
        if ($this->request->isAJAX()) {
            try {
                $session = session();
                //$encrypter = \Config\Services::encrypter();
                $validation =  \Config\Services::validation();

                if (!$session->has('nik'))
                    throw new \Exception("Session Expired", 2);
                session_write_close();
                $valid = $this->validate(['id' => ['rules' => 'required', 'label' => 'ID', 'errors' => ['required' => 'Rules.id.required',]]]);
                if (!$valid) {
                    $msg = ['errors' => ['errorID' => $validation->getError('id')]];
                }


                // $nik = '03301393';
                // $password = '123456';
                // $app_key = 'w71Y9wTLfRTIj1fsRnRX';

                // $data = [
                //     'nik' => $nik,
                //     'password' => $password,
                //     'app_key' => $app_key,
                // ];
                // $url = 'https://report-id.online/dais_sso_new/public/api/login';
                // $curl = curl_init($url);
                // $hasil0 = curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                // $hasil = curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                // $response_api = curl_exec($curl);

                // $jsonData = json_decode($response_api, true);


                // $duser = $jsonData['user']['nik'];

                //list Data

                $id = $this->request->getVar('id');

                $sql = "SELECT A.schedule_id AS 'SCHEDULE ID', A.schedule_date AS 'Schedule Date', A.patrol_date AS 'Inspection_Date', H.plant_name AS 'Plant', P.section_name 'Section', A.shift_id AS 'Shift',
                A.patroller_id, A.eq_erp_id AS 'Equipment_ID', B.eq_desc AS 'Equipment Name', K.checkpoint_name AS 'Checkpoint', L.checklist_desc AS 'Checkpoint Detail',
                M.option_name AS 'Condition', N.option_name AS 'Cleanliness', I.checklist_notes AS 'Checklist Notes',
                CASE 
                    WHEN Q.schedule_id IS NOT NULL THEN CONCAT('https://report-id.online/api_patrol_prod/checklist/image_proof?schedule_id=',A.schedule_id,'&mapping_id=',J.mapping_id)
                    ELSE NULL
                END AS'Image Proof',
                E.status_name AS 'Patrol Status', F.status_name AS 'End Shift Status', A.end_shift_reason AS 'End Shift Reason',
                A.completed_at_latitude, A.completed_at_longitude,
                CONCAT_WS('', '', A.completed_at_latitude, A.completed_at_longitude) AS patrol_location
                FROM schedules A
                LEFT JOIN master_equipment B ON A.eq_erp_id = B.eq_erp_id AND A.plant_dept = B.dept
                LEFT JOIN master_shift D ON A.shift_id = D.shift_id
                LEFT JOIN master_status E ON A.patrol_status = E.status_id
                LEFT JOIN master_status F ON A.end_shift_status = F.status_id
                LEFT JOIN (SELECT * FROM master_plant ) H ON A.plant_dept = H.dept
                LEFT JOIN (SELECT DISTINCT section_id, eq_erp_id, plant_dept FROM checklist_mapping) O ON A.eq_erp_id = O.eq_erp_id AND A.plant_dept = O.plant_dept
                LEFT JOIN master_section P ON O.section_id = P.section_id
                LEFT JOIN schedule_answer I ON A.schedule_id = I.schedule_id
                LEFT JOIN checklist_mapping J ON I.checklist_mapping_id = J.mapping_id
                LEFT JOIN master_checkpoint K ON J.checkpoint_id = K.checkpoint_id
                LEFT JOIN master_checklist L ON J.checklist_id = L.checklist_id
                LEFT JOIN checklist_option M ON I.option_id_condition = M.checklist_option_id
                LEFT JOIN checklist_option N ON I.option_id_cleanliness = N.checklist_option_id
                LEFT JOIN (SELECT DISTINCT schedule_id, checklist_mapping_id FROM image_uploaded) Q ON Q.schedule_id = A.schedule_id AND Q.checklist_mapping_id = J.mapping_id
                    WHERE A.schedule_date = '2022-06-30'
                    GROUP BY A.eq_erp_id
                        ORDER BY A.schedule_id, A.eq_erp_id, I.schedule_answer_id";

                $list_data = $this->db->query($sql);
                if (!$list_data) {
                    $msg = $_SESSION['id'] . " " . $this->router->fetch_class() . " : " . $this->db->error()["message"];
                    $msg = '1';
                    log_message("error1", $msg);
                    throw new \Exception("Invalid SQL!");
                }
                if ($list_data->resultID->num_rows == 0)
                    $str = "<tr><td colspan='8'>Data tidak ditemukan</td></tr>";

                $no = 1;
                $str = '';
                // $not_started = "Not Started (5)";
                $not_started = "Unresolved (" . $list_data->resultID->num_rows . ")";
                $cases_action = "<b>3</> cases waiting for your action";
                foreach ($list_data->getResult() as $v) {
                    $Inspection_Date = $v->Inspection_Date;
                    $newDate = date("d/m/Y", strtotime($Inspection_Date));

                    $idcomb = "wbi-" . $v->Equipment_ID;
                    $encrypted_id = "wbi-" . $v->Equipment_ID;

                    $tmped = "class='btn btn-xs btn-outline-info waves-purple waves-light btnRes' data-id='" . $encrypted_id . "'";

                    $str .= "<tr class='table-active' >";
                    $str .= "<td  class='text Column content' title=' ' >
                    <button class='btn btn-danger waves-effect waves-light kotak-satu' ></button>
                    <button class='btn btn-purple waves-effect waves-light kotak-dua' ></button>
                    <button class='btn btn-warning waves-effect waves-light kotak-tiga' ></button>

                    </td>";
                    $str .= "<td  class='text' title=''>" . $v->Equipment_ID . "</td>";
                    $str .= "<td  class='text' title=''>" . $newDate . "</td>";
                    //$str .= "<td  class='text ' title=''>" . $v->eq_erp_id . "</td>";
                    $str .= "<td  class='text' title=''>" . $v->Condition . "</td>";

                    $str .= "<td class='text-right'></td>";
                    //$str .= "<td  class='text' title=''></td>";
                    $str .= "<td  class=''><a href='javascript:void(0)' " . $tmped . " title='Open Case'><h7 class='mt-3 mb-0 ' ><small></small>Open Detail</h7></a></td>";
                    $str .= "</tr>";
                }
                //curl_close($curl);
                $response = array(
                    "status"    => 1,
                    "csrf_hash"     => csrf_hash(),
                    "str"           => $str,
                    "not_started"    => $not_started,
                    "not_action"    => $cases_action,
                );
                exit(json_encode($response));
            } catch (\Exception $exc) {
                $json_data = array(
                    "status"    => 0,
                    //"csrf_hash" => $this->security->get_csrf_hash(),
                    "csrf_hash" => csrf_hash(),
                    "msg"       => $exc->getMessage(),
                );
                exit(json_encode($json_data));
            }
        } else die("Die!");
    }
}
