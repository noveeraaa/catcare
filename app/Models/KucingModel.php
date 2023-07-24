<?php

namespace App\Models;

use CodeIgniter\Model;

class KucingModel extends Model
{
    protected $table = "tbl_kucing";
    protected $primaryKey = "id_kucing";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_kucing', 'deskripsi', 'foto'];
}