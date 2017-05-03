<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nim','nama','provinsi','kabupatenkota','kecamatan','kelurahan','created_at','update_at'];
    public $table = 'mahasiswas';
}
