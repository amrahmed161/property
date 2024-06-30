<?php

namespace App\Interfaces;

interface ServiceTypeInterface
{
    public function service_type_list($request);
    public function service_type_add($request);
    public function service_type_add_post($request);
    public function service_type_edit($id);
    public function service_type_edit_post($request);
    public function service_type_delete($id);
}
