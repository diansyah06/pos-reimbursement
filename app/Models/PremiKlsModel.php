<?php

namespace App\Models;

use CodeIgniter\Model;

class PremiKlsModel extends Model
{

    protected $table = 'premi_kls';

    protected $primaryKey = 'id';

    protected $allowedFields = ['id_klm', 'kls', 'harga'];

    public function saveKelas($data)
    {
        $query = $this->db->table('premi_kls')->insert($data);
        return $query;
    }

    public function updateKelas($data, $id)
    {
        $query = $this->db->table('premi_kls')->update($data, array('id' => $id));
        return $query;
    }

    public function deleteKelas($id)
    {
        $query = $this->db->table('premi_kls')->delete(array('id' => $id));
        return $query;
    }
}