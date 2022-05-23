<?php

namespace App\Models;

use CodeIgniter\Model;

class KelaminModel extends Model
{

    protected $table = 'jenis_kelamin';

    protected $primaryKey = 'id';

    protected $allowedFields = ['kelamin'];
}