<?php
namespace App\Repositories;

use App\Interfaces\VendorTypeInterface;
use App\Models\VendorType;


class VendorTypeRepository implements VendorTypeInterface
{
    public function vendor_type_list($request)
    {
        $data['getrecord'] = VendorType::get_record($request);
        return view('admin.vendor_type.list',$data);
    }
    public function vendor_type_add($request)
    {
        return view('admin.vendor_type.add');
    }
    public function vendor_type_store($request)
    {
        $save = request()->validate([
            'name' => 'required|unique:vendor_type',
        ]);
        $save = New VendorType;
        $save->name = trim($request->name);
        $save->save();
        return redirect('admin/vendor_type/list')->with('success','Record Successfully Create');
    }
    public function vendor_type_edit($id)
    {
        $data['getrecord'] = VendorType::get_single($id);
        return view('admin.vendor_type.edit',$data);
    }
    public function vendor_type_update($request,$id)
    {
        $save = request()->validate([
            'name' => 'required|unique:vendor_type',
        ]);
        $save =  VendorType::get_single($id);
        $save->name = trim($request->name);
        $save->save();
        return redirect('admin/vendor_type/list')->with('success','Record Successfully Update');
    }
    public function vendor_type_delete($id)
    {
        $vendor_type_delete = VendorType::get_single($id);
        $vendor_type_delete->is_delete = 1;
        $vendor_type_delete->save();
        return redirect()->back()->with('error' , 'Record Successfully delete!');
    }
}
