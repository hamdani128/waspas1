<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Config\Database;
use Mpdf\Mpdf;

class MetodeController extends BaseController
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
        return view('pages/view_metode', $data);
    }

    public function normalisasi()
    {
        $db = Database::connect();
        $max1 = $db->table('penilaian')->selectMax('nilai1', 'c1')->get()->getRowObject();
        $max2 = $db->table('penilaian')->selectMax('nilai2', 'c2')->get()->getRowObject();
        $max3 = $db->table('penilaian')->selectMax('nilai3', 'c3')->get()->getRowObject();
        $max4 = $db->table('penilaian')->selectMax('nilai4', 'c4')->get()->getRowObject();
        $max5 = $db->table('penilaian')->selectMax('nilai5', 'c5')->get()->getRowObject();
        $c1 = $max1->c1;
        $c2 = $max2->c2;
        $c3 = $max3->c3;
        $c4 = $max4->c4;
        $c5 = $max5->c5;
        $data = $db->table('penilaian')->get()->getResultObject();

        if (!empty($data)) {
            $no = 1;foreach ($data as $row): ?>
<tr class="paragraf">
    <td class="paragraf"><?=$no++;?></td>
    <td class="paragraf"><?=$row->alternatif_id;?></td>
    <td class="paragraf"><?=$row->nama;?></td>
    <td class="paragraf"><?=number_format($row->nilai1 / $c1, 2);?></td>
    <td class="paragraf"><?=number_format($row->nilai2 / $c2, 2);?></td>
    <td class="paragraf"><?=number_format($row->nilai3 / $c3, 2);?></td>
    <td class="paragraf"><?=number_format($row->nilai4 / $c4, 2);?></td>
    <td class="paragraf"><?=number_format($row->nilai5 / $c5, 2);?></td>
</tr>
<?php endforeach?> <?php
} else {
            ?>
<tr>
    <td colspan="8" class="text-center">Tidak Ada Data</td>
</tr>
<?php
}
    }

    public function normalisasi_terbobot()
    {
        $db = Database::connect();
        $max1 = $db->table('penilaian')->selectMax('nilai1', 'c1')->get()->getRowObject();
        $max2 = $db->table('penilaian')->selectMax('nilai2', 'c2')->get()->getRowObject();
        $max3 = $db->table('penilaian')->selectMax('nilai3', 'c3')->get()->getRowObject();
        $max4 = $db->table('penilaian')->selectMax('nilai4', 'c4')->get()->getRowObject();
        $max5 = $db->table('penilaian')->selectMax('nilai5', 'c5')->get()->getRowObject();
        $c1 = $max1->c1;
        $c2 = $max2->c2;
        $c3 = $max3->c3;
        $c4 = $max4->c4;
        $c5 = $max5->c5;

        $KR1 = $db->table('kriteria')->select('bobot')->where('kriteria_id', 'C1')->get()->getRowObject();
        $KR2 = $db->table('kriteria')->select('bobot')->where('kriteria_id', 'C2')->get()->getRowObject();
        $KR3 = $db->table('kriteria')->select('bobot')->where('kriteria_id', 'C3')->get()->getRowObject();
        $KR4 = $db->table('kriteria')->select('bobot')->where('kriteria_id', 'C4')->get()->getRowObject();
        $KR5 = $db->table('kriteria')->select('bobot')->where('kriteria_id', 'C5')->get()->getRowObject();

        $K1 = $KR1->bobot;
        $K2 = $KR2->bobot;
        $K3 = $KR3->bobot;
        $K4 = $KR4->bobot;
        $K5 = $KR5->bobot;

        $data = $db->table('penilaian')->get()->getResultObject();
        $query2 = $db->table('hasil')->truncate();
        if (!empty($data)) {
            $no = 1;foreach ($data as $row): ?>
<tr class="paragraf">
    <td class="paragraf"><?=$no++;?></td>
    <td class="paragraf"><?=$row->alternatif_id;?></td>
    <td class="paragraf"><?=$row->nama;?></td>
    <td class="paragraf">
        <?=
            number_format(0.5 * (
                (($row->nilai1 / $c1) * $K1) +
                (($row->nilai2 / $c2) * $K2) +
                (($row->nilai3 / $c3) * $K3) +
                (($row->nilai4 / $c4) * $K4) +
                (($row->nilai5 / $c5) * $K5)), 4)
            ;?>
    </td>
    <td>
        <?=
            number_format(0.5 * (
                (($row->nilai1 / $c1) ** $K1) *
                (($row->nilai2 / $c2) ** $K2) *
                (($row->nilai3 / $c3) ** $K3) *
                (($row->nilai4 / $c4) ** $K4) *
                (($row->nilai5 / $c5) ** $K5)), 4)
            ;?>
    </td>
    <td>
        <?=
            number_format(0.5 * (
                (($row->nilai1 / $c1) * $K1) +
                (($row->nilai2 / $c2) * $K2) +
                (($row->nilai3 / $c3) * $K3) +
                (($row->nilai4 / $c4) * $K4) +
                (($row->nilai5 / $c5) * $K5)), 4)
             +
            number_format(0.5 * (
                (($row->nilai1 / $c1) ** $K1) *
                (($row->nilai2 / $c2) ** $K2) *
                (($row->nilai3 / $c3) ** $K3) *
                (($row->nilai4 / $c4) ** $K4) *
                (($row->nilai5 / $c5) ** $K5)), 4)
            ;?>
    </td>
</tr>
<?php
$value = [
                'kode' => $row->alternatif_id,
                'nama' => $row->nama,
                'hasil' => number_format(0.5 * (
                    (($row->nilai1 / $c1) * $K1) +
                    (($row->nilai2 / $c2) * $K2) +
                    (($row->nilai3 / $c3) * $K3) +
                    (($row->nilai4 / $c4) * $K4) +
                    (($row->nilai5 / $c5) * $K5)), 4)
                 +
                number_format(0.5 * (
                    (($row->nilai1 / $c1) ** $K1) *
                    (($row->nilai2 / $c2) ** $K2) *
                    (($row->nilai3 / $c3) ** $K3) *
                    (($row->nilai4 / $c4) ** $K4) *
                    (($row->nilai5 / $c5) ** $K5)), 4),
            ];
            $query = $db->table('hasil')->insert($value);
            endforeach?> <?php
} else {
            ?>
<tr>
    <td colspan="4" class="text-center">Tidak Ada Data</td>
</tr>
<?php
}

    }

    public function rangking()
    {
        $db = Database::connect();
        $data = $db->table('hasil')->orderBy('hasil', 'DESC')->get()->getResultObject();
        $SQL = "SELECT SUM(hasil) as total FROM hasil";
        $data1 = $db->query($SQL)->getRowObject();
        if (!empty($data)) {
            $no = 1;
            $x = 0;
            $r = 1;foreach ($data as $row): ?>
<tr class="paragraf">
    <td class="paragraf"><?=$no++;?></td>
    <td class="paragraf"><?=$row->kode;?></td>
    <td class="paragraf"><?=$row->nama;?></td>
    <td class="paragraf"><?=$row->hasil;?></td>
    <td class="paragraf"><?=$r++;?></td>
    <td class="paragraf"><?= number_format(($row->hasil/$data1->total) * 100, 2) ?></td>
</tr>

<?php endforeach?> <?php
$time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
echo '<br>' .  $time;
} else {
?>
<tr>
    <td colspan="5" class="text-center">Tidak Ada Data</td>
</tr>
<?php
}
    }

    public function invoice()
    {
        $db = Database::connect();
        $report = $db->table('hasil')->get()->getResultObject();
        $data = [
            'title' => 'SPK Waspas Invoice',
            'report' => $report,
        ];
        $mpdf = new Mpdf(['mode' => 'utf8']);
        $mpdf->WriteHTML(view('pages/view_invoice', $data));
        return redirect()->to($mpdf->Output('Report_SPK_Waspas', 'I'));
    }

    public function timing()
    {
        $time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
        $data = number_format($time, 3);
        return json_encode($data);
    }

}