<?php

namespace App\Interfaces;

interface VendorTypeInterface
{
    public function vendor_type_list($request);
    public function vendor_type_add($request);
    public function vendor_type_store($request);
    public function vendor_type_edit($id);
    public function vendor_type_update($request,$id);
    public function vendor_type_delete($id);
}
