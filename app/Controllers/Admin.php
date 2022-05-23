<?php

namespace App\Controllers;

use CodeIgniter\HTTP\IncomingRequest;

use App\Models\KelaminModel;

use App\Models\KelasModel;
use App\Models\PremiKlsModel;

use App\Models\PremiModel;
use App\Models\TanggungModel;

/**
 * @property IncomingRequest $request;
 */

class Admin extends BaseController
{
    protected $premi;

    function __construct()
    {
        $this->premi = new PremiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Admin | Dashboard'
        ];
        return view('admin/index', $data);
    }

    public function pembayaran()
    {
        $data = [
            'title' => 'Admin | Pembayaran'
        ];
        $KelaminModel = new KelaminModel();

        $data['jenis_kelamin'] = $KelaminModel->orderBy('kelamin', 'ASC')->findAll();

        $listTanggung = new TanggungModel();
        $data['list_tanggung'] = $listTanggung->findAll();

        return view('admin/pembayaran', $data);
    }

    public function premi()
    {
        $data = [
            'title' => 'Admin | Premi'
        ];

        $data['premi'] = $this->premi->findAll();

        $KelaminModel = new KelaminModel();
        $data['jenis_kelamin'] = $KelaminModel->orderBy('kelamin', 'ASC')->findAll();

        return view('admin/premi', $data);
    }

    public function savepremi()
    {
        $model = new PremiModel();
        $data = array(
            'nama'        => $this->request->getPost('nama'),
            'tgl_lahir'       => $this->request->getPost('datePicker'),
            'kelamin' => $this->request->getPost('kelamin'),
            'kls' => $this->request->getPost('kelas'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'total' => $this->request->getPost('total'),
        );
        $model->savePremi($data);
        return redirect()->to('/admin/premi');
    }

    public function updatepremi()
    {
        $model = new PremiModel();
        $id = $this->request->getPost('id');
        $data = array(
            'nama'        => $this->request->getPost('nama'),
            'tgl_lahir'       => $this->request->getPost('datePicker'),
            // 'kelamin' => $this->request->getPost('kelamin'),
            // 'kls' => $this->request->getPost('kelas'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'total' => $this->request->getPost('total'),
        );
        $model->updatePremi($data, $id);
        return redirect()->to('/admin/premi');
    }

    public function deletePremi()
    {
        $model = new PremiModel();
        $id = $this->request->getPost('id');
        $model->deletePremi($id);
        return redirect()->to('/admin/premi');
    }

    function action()
    {
        if ($this->request->getVar('action')) {
            $action = $this->request->getVar('action');

            if ($action == 'get_kelas') {
                $kelasModel = new KelasModel();

                $kelasdata = $kelasModel->where('id_klm', $this->request->getVar('id_klm'))->findAll();

                echo json_encode($kelasdata);
            }
        }
    }

    function action2()
    {
        if ($this->request->getVar('action2')) {
            $action2 = $this->request->getVar('action2');

            if ($action2 == 'get_harga') {
                $hargaModel = new KelasModel();

                $Hargadata = $hargaModel->where('id', $this->request->getVar('id'))->findAll();

                echo json_encode($Hargadata);
            }
        }
    }

    public function kelasmanagement()
    {
        $data = [
            'title' => 'Admin | Kelas Management'
        ];

        $premiklsModel = new PremiKlsModel();

        $data['premi_kls'] = $premiklsModel->findAll();

        $KelaminModel = new KelaminModel();

        $data['jenis_kelamin'] = $KelaminModel->orderBy('kelamin', 'ASC')->findAll();

        return view('admin/kelasmanagement', $data);
    }

    public function savekelas()
    {
        $model = new PremiKlsModel();
        $data = array(
            'id_klm'        => $this->request->getPost('kelamin'),
            'kls'       => $this->request->getPost('kelas'),
            'harga' => $this->request->getPost('harga'),
        );
        $model->saveKelas($data);
        return redirect()->to('/admin/kelasmanagement');
    }

    public function updatekelas()
    {
        $model = new PremiKlsModel();
        $id = $this->request->getPost('id');
        $data = array(
            'id_klm'        => $this->request->getPost('kelamin'),
            'kls'       => $this->request->getPost('kelas'),
            'harga' => $this->request->getPost('harga'),
        );
        $model->updateKelas($data, $id);
        return redirect()->to('/admin/kelasmanagement');
    }

    public function deletekelas()
    {
        $model = new PremiKlsModel();
        $id = $this->request->getPost('id');
        $model->deleteKelas($id);
        return redirect()->to('/admin/kelasmanagement');
    }
}