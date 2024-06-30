<?php

namespace App\Interfaces;

interface CategoryInterface
{
    public function category_list($request);
    public function category_add($request);
    public function category_insert($request);
    public function category_edit($id);
    public function category_update($request);
    public function category_delete($id);


}
