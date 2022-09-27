<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Config\Database;

class KriteriaController extends BaseController
{

    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $db = \Config\Database::connect();
        $kriteria = $db->table('kriteria')->get()->getResultObject();
        $data = [
            'userinfo' => $UserInfo,
            'kriteria' => $kriteria,
        ];
        return view('pages/view_kriteria', $data);
    }

    public function show_kriteria()
    {
        $id = $_GET['id'];
        $db = Database::connect();
        $value = $db->table('kriteria')->where('id', $id)->get()->getRowObject();
        $data[0] = $value->kriteria_id;
        $data[1] = $value->nama;
        $data[2] = $value->bobot;
        $data[3] = $value->jenis;
        $data[4] = $value->keterangan;
        return json_encode($data);
    }

}