<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AMC extends Model
{
    use HasFactory;
    protected $table = 'amc';

     static public function get_record($request)
    {
        $return = self::select('amc.*')->orderBy('id','asc')->where('is_delete','=',0);
        $return = $return->paginate(3);
        return $return;
    }
    static public function get_single($id)
    {
        return self::find($id);
    }

    static public function get_record_delete()
    {
        return self::where('is_delete',0)->get();
    }

    public function option()
    {
        return $this->hasMany(AmcFreeService::class,'amc_id');
    }
}