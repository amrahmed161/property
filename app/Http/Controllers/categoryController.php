<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\CategoryInterface;
use App\Models\Category;

class categoryController extends Controller
{
    private CategoryInterface $category;

    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }
    public function category_list(Request $request)
    {
        return $this->category->category_list($request);
    }


    public function category_add(Request $request)
    {
        return $this->category->category_add($request);
    }

    public function category_insert(Request $request)
    {
        return $this->category->category_insert($request);
    }

    public function category_edit( $id)
    {
        return $this->category->category_edit($id);
    }

    public function category_update(Request $request)
    {
        return $this->category->category_update($request);
    }

    public function category_delete( $id)
    {
        return $this->category->category_delete($id);
    }
}
