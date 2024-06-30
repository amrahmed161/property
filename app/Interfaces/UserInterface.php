<?php

namespace App\Interfaces;

interface UserInterface
{
    public function user_list($request);
    public function user_add($request);
    public function user_store($request);
    public function user_edit($id);
    public function user_edit_store($request,$id);
    public function user_delete($id);
}

