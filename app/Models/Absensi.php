<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    //
    protected $connection = 'sims';
    protected $table = 'hr_tbl_absen_harian';

    protected $guarded = [];
}
