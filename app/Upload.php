<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    //
    protected $fillable = [
    	'id_user','id_cat','judul','file','pengarang','institusi','abstrak','view_count','download_count','year'
    ];
}
