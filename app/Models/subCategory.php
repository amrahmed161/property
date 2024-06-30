<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_category';

    static public function get_record($request)
    {
        $return = self::select('sub_category.*','category.name as category_name')->join('category','category.id','=','sub_category.category_id')->orderBy('sub_category.id','desc')->where('sub_category.is_delete','=',);
        $return = $return->paginate(20);
        return $return;
    }
    static public function get_single($id)
    {
        return self::find($id);
    }
}
