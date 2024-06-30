<?php
namespace App\Repositories;
use App\Models\ServiceType;
use App\Interfaces\ServiceTypeInterface;

class ServiceTypeRepository implements ServiceTypeInterface
{
    public function service_type_list($request)
    {
        $data['get'] = ServiceType::get_record($request);
        return view('admin.service_type.list',$data);
    }
    public function service_type_add($request)
    {
        return view('admin.service_type.add');
    }
    public function service_type_add_post($request)
    {
        $save = request()->validate([
            'name' => 'required|unique:service_type',
        ]);
        $save = New ServiceType;
        $save->name = trim($request->name);
        $save->save();
        return redirect('admin/service_type/list')->with('success','Record Successfully Create');
    }
    public function service_type_edit($id)
    {

        $data['get'] = ServiceType::get_single($id);
        return view('admin.service_type.edit',$data);
    }
    public function service_type_edit_post($request)
    {
        $user = request()->validate([
            'name' => 'required|unique:service_type',
        ]);
        $r_insert = ServiceType::get_single($request->id);
        $r_insert->name = trim($request->name);
        $r_insert->save();
        return redirect('admin\service_type\list')->with('success','Record Successfully Create');
    }
    public function service_type_delete($id)
    {
        $service_type_delete = ServiceType::get_single($id);
        $service_type_delete->is_delete = 1;
        $service_type_delete->save();
        return redirect()->back()->with('error' , 'Record Successfully delete!');
    }
}
