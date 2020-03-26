<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $table = 'logs';
    public $timestamps = false;

    public function getAllLogs(){

        return \DB::table($this->table)
            ->orderBy('id', 'DESC')
            ->paginate(15);

    }
}
