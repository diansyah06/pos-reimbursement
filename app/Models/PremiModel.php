<?php

namespace App\Models;

use CodeIgniter\Model;

class PremiModel extends Model
{
    protected $table = "premi";
    protected $primaryKey = "id";
    protected $allowedFields = ['id', 'nama', 'tgl_lahir', 'kelamin', 'kls', 'pekerjaan', 'total'];

    public function savePremi($data)
    {
        $query = $this->db->table('premi')->insert($data);
        return $query;
    }

    public function updatePremi($data, $id)
    {
        $query = $this->db->table('premi')->update($data, array('id' => $id));
        return $query;
    }

    public function deletePremi($id)
    {
        $query = $this->db->table('premi')->delete(array('id' => $id));
        return $query;
    }
}