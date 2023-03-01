<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_perjalanan extends Model
{
    protected $table ='tb_perjalanans';
    protected $fillable = [

        'user_id',
        'tanggal',
        'jam',
        'perjalanan',
        'suhu_tubuh',
        'lokasi'
    ];

    protected $primaryKey = 'id';
    
    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }
}
