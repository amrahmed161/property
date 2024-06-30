<?php

namespace App\Http\Controllers;

use App\Models\AMC;
use Illuminate\Http\Request;
use App\Interfaces\AMCInterface;

class AMCController extends Controller
{
    private AMCInterface $AMC;

    public function __construct(AMCInterface $AMC)
    {
        $this->AMC = $AMC;
    }
    public function amc_list(Request $request)
    {

        return $this->AMC->amc_list($request);
    }

    public function amc_add(Request $request)
    {
        return $this->AMC->amc_add($request);
    }

    public function amc_insert(Request $request)
    {
        return $this->AMC->amc_insert($request);
    }

    public function amc_edit( $id )
    {
        return $this->AMC->amc_edit( $id );
    }

    public function amc_update( Request $request)
    {
        return $this->AMC->amc_update( $request);
    }

    public function amc_delete($id )
    {
        return $this->AMC->amc_delete($id );
    }
    public function amc_add_ons_list($id)
    {
        return $this->AMC->amc_add_ons_list($id);
    }
    public function amc_add_add_ons($id)
    {
        return $this->AMC->amc_add_add_ons($id);
    }
    public function amc_store_add_ons(Request $request)
    {
        return $this->AMC->amc_store_add_ons($request);
    }
    public function amc_edit_add_ons($id)
    {
        return $this->AMC->amc_edit_add_ons($id);
    }
    public function amc_edit_add_ons_update(Request $request , $id)
    {
        return $this->AMC->amc_edit_add_ons_update($request , $id);
    }
    public function amc_delete_add_ons($id)
    {
        return $this->AMC->amc_delete_add_ons($id);
    }
    public function amc_free_service(Request $request , $id)
    {
        return $this->AMC->amc_free_service($request , $id);
    }
    public function amc_add_free_service(Request $request , $id)
    {
        return $this->AMC->amc_add_free_service($request , $id);
    }
    public function amc_store_free_service(Request $request)
    {
        return $this->AMC->amc_store_free_service($request);
    }
    public function edit_free_service($id)
    {
        return $this->AMC->edit_free_service($id);
    }
    public function amc_update_free_service(Request $request , $id)
    {
        return $this->AMC->amc_update_free_service($request , $id);
    }
    public function amc_delete_free_service($id)
    {
        return $this->AMC->amc_delete_free_service($id);
    }
}
