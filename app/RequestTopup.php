<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestTopup extends Model
{
    protected $table = 'permintaan_topup';

    protected $primarykey = 'id_permintaan';

    public function user()
    {
    	return $this->belongsTo('App\UserSaldo', 'id', 'id');
    }
}
