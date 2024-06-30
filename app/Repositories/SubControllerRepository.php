<?php
namespace App\Repositories;
use App\Models\Category;
use App\Models\subCategory;
use App\Interfaces\SubControllerInterface;


class SubControllerRepository implements SubControllerInterface

{
    public function sub_category_list($request)
    {
        $data['getrecord'] = subCategory::get_record($request);
        return view('admin.sub_category.list',$data);
    }

    public function sub_category_add($request)
    {
        $data['getCategory'] = Category::get_record($request);
        return view('admin.sub_category.add',$data);
    }

    public function sub_category_store($request)
    {
        $store = request()->validate([
            'category_id' => 'required',
            'name' => 'required'
        ]);
        $store = new subCategory;
        $store->category_id = trim($request->category_id);
        $store->name = trim($request->name);
        $store->save();
        return redirect('admin/sub_category/list')->with('success','Sub Category successfully create');

    }
    public function sub_category_edit($request,$id)
    {
        $data['getCategory'] = Category::get_record($request);
        $data['getrecord'] = subCategory::get_single($id);
        return view('admin.sub_category.edit',$data);
    }

    public function sub_category_update($request,$id)
    {
        $store = request()->validate([
            'category_id' => 'required',
            'name' => 'required'
        ]);
        $store =  subCategory::get_single($id);
        $store->category_id = trim($request->category_id);
        $store->name = trim($request->name);
        $store->save();
        return redirect('admin/sub_category/list')->with('success','Sub Category successfully Update');
    }

    public function sub_category_delete($id)
    {
        $delete = subCategory::get_single($id);
        $delete->is_delete = 1;
        $delete->save();

        return redirect('admin/sub_category/list')->with('success','Sub Category successfully delete');
    }

}
