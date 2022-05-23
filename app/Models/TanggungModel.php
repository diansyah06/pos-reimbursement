<?php

//StateModel.php

namespace App\Models;

use CodeIgniter\Model;

class TanggungModel extends Model
{

    protected $table = 'list_tanggung';

    protected $primaryKey = 'id';

    protected $allowedFields = ['kode', 'desk'];
}