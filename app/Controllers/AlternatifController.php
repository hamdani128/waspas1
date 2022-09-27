<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Database\Config;
use Config\Database;

class AlternatifController extends BaseController
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
        $alternatif = $db->table('alternatif')->get()->getResultObject();
        $data = [
            'userinfo' => $UserInfo,
            'alternatif' => $alternatif,
        ];
        return view('pages/view_alternatif', $data);
    }

    public function save()
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);

        $alternatif_id = $this->request->getPost('alternatif_id');
        $inisialisasi = $this->request->getPost('inisialisasi_id');
        $nama = $this->request->getPost('nama');
        $jenis_jk = $this->request->getPost('jk');
        $alamat = $this->request->getPost('alamat');
        $no_hp = $this->request->getPost('no_hp');
        $pendidikan = $this->request->getPost('pendidikan');
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $data = [
            'alternatif_id' => $alternatif_id,
            'inisialisasi' => $inisialisasi,
            'nama' => $nama,
            'jk' => $jenis_jk,
            'hp' => $no_hp,
            'alamat' => $alamat,
            'pendidikan' => $pendidikan,
            'user_id' => session()->get('loggedUser'),
            'created_at' => $now,
            'updated_at' => $now,
        ];
        $db = Config::connect();
        $query = $db->table('alternatif')->insert($data);
        if ($query) {
            session()->setFlashData('message', 'Data Berhasil Ditambah !');
            return redirect()->to('/alternatif');
        }
    }

    public function show_update()
    {
        $id = $_GET['id'];
        $db = Database::connect();
        $value = $db->table('alternatif')->where('id', $id)->get()->getRowObject();
        $data[0] = $value->alternatif_id;
        $data[1] = $value->inisialisasi;
        $data[2] = $value->nama;
        $data[3] = $value->jk;
        $data[4] = $value->alamat;
        $data[5] = $value->hp;
        $data[6] = $value->pendidikan;
        return json_encode($data);

    }

    public function update_alternatif()
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);

        $id = $this->request->getPost('id_update');
        $alternatif_id = $this->request->getPost('alternatif_id_update');
        $inisialisasi = $this->request->getPost('inisialisasi_id_update');
        $nama = $this->request->getPost('nama_update');
        $jenis_jk = $this->request->getPost('jk_update');
        $alamat = $this->request->getPost('alamat_update');
        $no_hp = $this->request->getPost('no_hp_update');
        $pendidikan = $this->request->getPost('pendidikan_update');
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $data = [
            'alternatif_id' => $alternatif_id,
            'inisialisasi' => $inisialisasi,
            'nama' => $nama,
            'jk' => $jenis_jk,
            'hp' => $no_hp,
            'alamat' => $alamat,
            'pendidikan' => $pendidikan,
            'user_id' => session()->get('loggedUser'),
            'created_at' => $now,
            'updated_at' => $now,
        ];
        $db = Database::connect();
        $query = $db->table('alternatif')->where('id', $id)->update($data);
        if ($query) {
            session()->setFlashData('message', 'Data Berhasil Dirubah !');
            return redirect()->to('/alternatif');
        }

    }

    public function delete_alternatif($id)
    {
        $db = Database::connect();
        $query = $db->table('alternatif')->where('id', $id)->delete();
        if ($query) {
            session()->setFlashData('message', 'Data Berhasil Terhapus !');
            return redirect()->to('/alternatif');
        }
    }

}