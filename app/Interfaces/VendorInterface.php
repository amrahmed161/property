<?php

namespace App\Interfaces;

interface VendorInterface
{
    public function vendor_list($request);
    public function vendor_add($request);
    public function vendor_store($request);
    public function send_vendor_verification_mail($user);
    public function vendor_password($request,$token);
    public function vendor_password_post($request,$token);
    public function vendor_edit($request,$id);
    public function vendor_update($request,$id);
    public function vendor_delete($id);
}
