<?php
namespace App\Repositories;
use App\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
    public function category_list($request)
    {
        $data ['getrecord'] = Category::get_record($request);
        return view('admin.category.list',$data);
    }
    public function category_add($request)
    {
        return view('admin.category.add');
    }
    public function category_insert($request)
    {
        //dd($request->all());
        $user = request()->validate([
            'name' => 'required|unique:category',
        ]);
        $save = new Category;
        $save->name = trim($request->name);
        $save->save();

        return redirect('admin/category/list')->with('success', 'Record Successfully Create');
    }

    public function category_edit($id)
    {
        $data['getrecord'] = Category::get_single($id);
        return view ('admin.category.edit',$data);
    }

    public function category_update($request)
    {
        $user = request()->validate([
            'name' => 'required|unique:category',
        ]);
        $save =  Category::get_single($request->id);
        $save->name = trim($request->name);
        $save->save();

        return redirect('admin\category\list')->with('success', 'Record Successfully Update');
    }
    public function category_delete($id)
    {
        $category_delete = Category::get_single($id);
        $category_delete->is_delete = 1;
        $category_delete->save();
        return redirect()->back()->with('error' , 'Record Successfully delete!');
    }


}
