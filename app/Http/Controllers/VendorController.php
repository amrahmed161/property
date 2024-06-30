<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Interfaces\VendorInterface;
use App\Http\Requests\ResetPassword;

class VendorController extends Controller
{
    private VendorInterface $VendorType;

    public function __construct(VendorInterface $Vendor)
    {
        $this->Vendor = $Vendor;
    }
    public function vendor_list(Request $request)
    {
        return $this->Vendor->vendor_list($request);
    }

    public function vendor_add( Request $request)
    {
        return $this->Vendor->vendor_add($request);
    }

    public function vendor_store(Request $request)
    {
        return $this->Vendor->vendor_store($request);
    }

    public function send_vendor_verification_mail($user)
    {
        return $this->Vendor->send_vendor_verification_mail($user);
    }

    public function vendor_password(Request $request , $token)
    {
        return $this->Vendor->vendor_password($request,$token);
    }

    public function vendor_password_post(ResetPassword $request, $token)
    {
        return $this->Vendor->vendor_password_post($request,$token);
    }


    public function vendor_edit(Request $request , $id)
    {
        return $this->Vendor->vendor_edit($request,$id);
    }

    public function vendor_update(Request $request , $id)
    {
        return $this->Vendor->vendor_update($request,$id);
    }

    public function vendor_delete($id)
    {
        return $this->Vendor->vendor_delete($id);
    }
}
