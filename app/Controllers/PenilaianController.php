<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Config\Database;

class PenilaianController extends BaseController
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
        $penilaian = $db->table('penilaian')->get()->getResultObject();
        $alternatif = $db->table('alternatif')->get()->getResultObject();
        $data = [
            'userinfo' => $UserInfo,
            'alternatif' => $alternatif,
            'penilaian' => $penilaian,
        ];
        return view('pages/view_penilaian', $data);
    }

    public function get($kode)
    {
        $db = \Config\Database::connect();
        $query = $db->table('alternatif')->where('alternatif_id', $kode)->get()->getRowObject();
        $data[0] = $query->nama;
        return json_encode($data);
    }

    public function save()
    {
        $db = Database::connect();
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);

        $data = [
            'alternatif_id' => $this->request->getPost('alternatif_id'),
            'nama' => $this->request->getPost('nama'),
            'kriteria1' => $this->request->getPost('kriteria1'),
            'nilai1' => $this->request->getPost('nilai1'),
            'kriteria2' => $this->request->getPost('kriteria2'),
            'nilai2' => $this->request->getPost('nilai2'),
            'kriteria3' => $this->request->getPost('kriteria3'),
            'nilai3' => $this->request->getPost('nilai3'),
            'kriteria4' => $this->request->getPost('kriteria4'),
            'nilai4' => $this->request->getPost('nilai4'),
            'kriteria5' => $this->request->getPost('kriteria5'),
            'nilai5' => $this->request->getPost('nilai5'),
            'user_id' => session()->get('loggedUser'),
        ];
        $query = $db->table('penilaian')->insert($data);
        if ($query) {
            session()->setFlashData('message', 'Data Berhasil Ditambah !');
            return redirect()->to('/penilaian');
        }

    }

    public function show_update()
    {
        $id = $_GET['id'];
        $db = Database::connect();
        $value = $db->table('penilaian')->where('id', $id)->get()->getRowObject();
        $data[0] = $value->alternatif_id;
        $data[1] = $value->nama;
        $data[2] = $value->kriteria1;
        $data[3] = $value->nilai1;
        $data[4] = $value->kriteria2;
        $data[5] = $value->nilai2;
        $data[6] = $value->kriteria3;
        $data[7] = $value->nilai3;
        $data[8] = $value->kriteria4;
        $data[9] = $value->nilai4;
        $data[10] = $value->kriteria5;
        $data[11] = $value->nilai5;
        return json_encode($data);

    }

    public function update_penilaian()
    {
        $id = $this->request->getPost('id_update');
        $data = [
            'alternatif_id' => $this->request->getPost('alternatif_id_update'),
            'nama' => $this->request->getPost('nama_update'),
            'kriteria1' => $this->request->getPost('kriteria1_update'),
            'nilai1' => $this->request->getPost('nilai1_update'),
            'kriteria2' => $this->request->getPost('kriteria2_update'),
            'nilai2' => $this->request->getPost('nilai2_update'),
            'kriteria3' => $this->request->getPost('kriteria3_update'),
            'nilai3' => $this->request->getPost('nilai3_update'),
            'kriteria4' => $this->request->getPost('kriteria4_update'),
            'nilai4' => $this->request->getPost('nilai4_update'),
            'kriteria5' => $this->request->getPost('kriteria5_update'),
            'nilai5' => $this->request->getPost('nilai5_update'),
            'user_id' => session()->get('loggedUser'),
        ];

        $db = Database::connect();
        $query = $db->table('penilaian')->where('id', $id)->update($data);
        if ($query) {
            session()->setFlashData('message', 'Data Berhasil Dirubah !');
            return redirect()->to('/penilaian');
        }
    }


    public function delete_penilaian($id)
    {
        $db = Database::connect();
        $query = $db->table('penilaian')->where('id', $id)->delete();
        if ($query) {
            session()->setFlashData('message', 'Data Berhasil Dihapus !');
            return redirect()->to('/penilaian');
        }
    }

}