<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estagiario extends Model
{
    public function instituto()
    {

        return $this->belongsTo(Instituto::class);
    }
    public function plano(){
        return $this->belongsTo(PlanoEstagio::class, 'plano_estagio_id');
    }
}
