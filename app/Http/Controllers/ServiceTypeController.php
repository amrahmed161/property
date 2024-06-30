<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\ServiceTypeInterface;
class ServiceTypeController extends Controller
{
    private ServiceTypeInterface $ServiceType;

    public function __construct(ServiceTypeInterface $ServiceType)
    {
        $this->ServiceType = $ServiceType;
    }
    public function service_type_list(Request $request)
    {
        return $this->ServiceType->service_type_list($request);
    }

    public function service_type_add(Request $request)
    {
        return $this->ServiceType->service_type_add($request);
    }

    public function service_type_add_post(Request $request)
    {
        return $this->ServiceType->service_type_add_post($request);
    }

    public function service_type_edit( $id)
    {
        return $this->ServiceType->service_type_edit($id);
    }

    public function service_type_edit_post(Request $request)
    {
        return $this->ServiceType->service_type_edit_post($request);
    }

    public function service_type_delete($id)
    {
        return $this->ServiceType->service_type_delete($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
