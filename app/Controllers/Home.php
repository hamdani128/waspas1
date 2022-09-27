<?php

namespace App\Controllers;

use App\Models\UserModel;
use Config\Database;

class Home extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function index()
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $alternatif = $this->db->table('alternatif')->get()->getResultObject();
        $kriteria = $this->db->table('kriteria')->get()->getResultObject();
        $penilaian = $this->db->table('penilaian')->get()->getResultObject();
        $data = [
            'userinfo' => $UserInfo,
            'alternatif' => $alternatif,
            'kriteria' => $kriteria,
            'penilaian' => $penilaian
        ];

        return view('layout/index', $data);
    }
}