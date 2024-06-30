<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmcAddOne extends Model
{
    use HasFactory;
    protected $table = 'add_ons_list';

    static public function get_single($id)
    {
        return self::find($id);
    }

    static public function get_add_ons($id)
    {
        $return =  self::select('add_ons_list.*')->where('amc_id','=', $id)->orderBy('id','asc');

        $return = $return->paginate(20);
        return $return;
    }
}
