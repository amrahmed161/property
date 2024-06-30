<?php

namespace App\Interfaces;

interface AMCInterface
{
    public function amc_list($request);
    public function amc_add($request);
    public function amc_insert($request);
    public function amc_edit($id);
    public function amc_update( $request);
    public function amc_delete( $id);
    public function amc_add_ons_list($id);
    public function amc_add_add_ons($id);
    public function amc_store_add_ons($request);
    public function amc_edit_add_ons($id);
    public function amc_edit_add_ons_update($request , $id);
    public function amc_delete_add_ons($id);
    public function amc_free_service($request ,$id);
    public function amc_add_free_service($request ,$id);
    public function amc_store_free_service($request);
    public function edit_free_service($id);
    public  function amc_update_free_service($request , $id);
    public function amc_delete_free_service($id);
}
