<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\VendorTypeInterface;

class VendorTypeController extends Controller
{
    private VendorTypeInterface $VendorType;

    public function __construct(VendorTypeInterface $VendorType)
    {
        $this->VendorType = $VendorType;
    }
    public function vendor_type_list(Request $request)
    {
        return $this->VendorType->vendor_type_list($request);
    }

    public function vendor_type_add(Request $request)
    {
        return $this->VendorType->vendor_type_add($request);
    }

    public function vendor_type_store(Request $request)
    {
        return $this->VendorType->vendor_type_store($request);
    }

    public function vendor_type_edit($id)
    {
        return $this->VendorType->vendor_type_edit($id);
    }


    public function vendor_type_update(Request $request , $id)
    {
        return $this->VendorType->vendor_type_update($request,$id);
    }


    public function vendor_type_delete($id)
    {
        return $this->VendorType->vendor_type_delete($id);
    }

}
