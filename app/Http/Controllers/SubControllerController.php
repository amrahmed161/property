<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\SubControllerInterface;

class SubControllerController extends Controller
{
    private SubControllerInterface $sub_category;

    public function __construct(SubControllerInterface $sub_category)
    {
        $this->sub_category = $sub_category;
    }
    public function sub_category_list(Request $request)
    {
        return $this->sub_category->sub_category_list($request);
    }

    public function sub_category_add(Request $request)
    {
        return $this->sub_category->sub_category_add($request);
    }

    public function sub_category_store(Request $request)
    {
        return $this->sub_category->sub_category_store($request);
    }

    public function sub_category_edit(Request $request,$id)
    {
        return $this->sub_category->sub_category_edit($request,$id);
    }


    public function sub_category_update(Request $request, $id)
    {
        return $this->sub_category->sub_category_update($request,$id);
    }

    public function sub_category_delete($id)
    {
        return $this->sub_category->sub_category_delete($id);
    }


}
