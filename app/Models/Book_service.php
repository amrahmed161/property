<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book_service extends Model
{
    use HasFactory;
    protected $table = 'books_service';

    static public function getBookService($b_id,$request)
    {
        $return = self::select('book_service.*')->where('book_service.user_id','=',$b_id)->orderBy('book_service.id','desc');
        $return = $return->paginate(40);
        return $return;
    }
    public function get_service_type_name()
    {
        return $this->beLongsTO(ServiceType::class,'service_type_id');
    }

    public function get_category_name()
    {
        return $this->beLongsTo(Category::class,'category_id');
    }

    public function get_sub_category_name()
    {
        return $this->belongsTo(subCategory::class,'sub_category_id');
    }
}
