<?php

//StateModel.php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{

    protected $table = 'premi_kls';

    protected $primaryKey = 'id';

    protected $allowedFields = ['id_klm', 'kls', 'harga'];
}