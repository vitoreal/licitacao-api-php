<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licitacao extends Model
{
    use HasFactory;

    public $timestamps = false;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'licitacao';

    protected $fillable = [
        'codigo_uasg:',
        'numero_pregao',
        'objeto',
        'data_proposta',
        'visualizada'
    ];

}
