<?php

namespace App\Interfaces;

interface SubControllerInterface
{
    public function sub_category_list($request);
    public function sub_category_add($request);
    public function sub_category_store($request);
    public function sub_category_edit($request,$id);
    public function sub_category_update($request,$id);
    public function sub_category_delete($id);
}
