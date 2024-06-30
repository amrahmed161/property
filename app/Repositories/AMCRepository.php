<?php
namespace App\Repositories;

use App\Models\AMC;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Interfaces\AMCInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AmcAddOne;
use App\Models\AmcFreeService;

class AMCRepository implements AMCInterface
{
    public function amc_list($request)
    {
        $data ['getrecord'] = AMC::get_record($request);
        return view('admin.amc.list',$data);
    }
    public function amc_add($request)
    {
        return view('admin.amc.add');
    }
    public function amc_insert($request){
        //dd($request->all());
        $user = request()->validate([
            'name' => 'required|unique:amc',
            'amount'=> 'required|',
        ]);
        $user =new AMC;
        $user->name = trim($request->name);
        $user->amount = trim($request->amount);
        $user->business_category = trim($request->business_category);
        $user->series = trim($request->series);
        $user->save();
        return redirect('admin/amc/list')->with('success','Record Successfully Create');

    }
    public function amc_edit($id)
    {
        $data['getrecord'] = AMC::get_single($id);
        return view ('admin.amc.edit',$data);
    }
    public function amc_update($request)
    {
        $user = request()->validate([
            'name' => 'required|unique:amc,name',
            'amount'=> 'required|',
        ]);
        $user = AMC::get_single($request->id);
        $user->name = trim($request->name);
        $user->amount = trim($request->amount);
        $user->business_category = trim($request->business_category);
        $user->series = trim($request->series);
        $user->save();
        return redirect('admin/amc/list')->with('success','Record Successfully Update');
    }

    public function amc_delete($id)
    {
        $delete_record = AMC::get_single($id);
        $delete_record->is_delete = 1;
        $delete_record->save();
        return redirect()->back()->with('error' , 'Record Successfully delete!');
    }
    public function amc_add_ons_list($id)
    {
        $data['getrecord'] = Amc::get_single($id);
        $data['get_add_ons'] = AmcAddOne::get_add_ons($id);
        return view('admin.amc.add_ons_list',$data);
    }
    public function amc_add_add_ons($id)
    {
        $data['getrecord'] = Amc::get_single($id);
        return view('admin.amc.add_ons_add',$data);
    }
    public function amc_store_add_ons($request)
    {
        $insert_r = request()->validate([
            'amc_id' => 'required',
            'name' => 'required',
            'price' => 'required',
        ]);
        $insert = new AmcAddOne;
        $insert->amc_id =trim ($request->amc_id);
        $insert->name =trim ($request->name);
        $insert->price = !empty($request->price) ? $request-> price : '0' ;
        $insert->save();
        return redirect('admin/amc/add_ons/'.$request->amc_id)->with('success','Record Successfully created');

    }

    public function amc_edit_add_ons($id)
    {
        $data['getrecord'] = AmcAddOne::get_single($id);
        return view('admin.amc.add_ons_edit',$data);
    }
    public function amc_edit_add_ons_update($request , $id)
    {
        $update = AmcAddOne::get_single($id);
        $update->name = trim($request->name);
        $update->price = !empty($request->price) ? $request->price : '0';
        $update -> save();

        return redirect('admin/amc/add_ons'. $update->amc_id)->with('success', 'Record Successfully Update');
    }
    public function amc_delete_add_ons($id)
    {
        $delete_record = AmcAddOne::get_single($id);
        $delete_record->delete();
        return redirect()->back()->with('error','Record successfully deleted');
    }
    public function amc_free_service($request , $id)
    {
        $data['getrecord'] = Amc::get_single($id);
        $data['get_free_service'] = AmcFreeService::get_free_service($id);
        return view('admin.amc.free_service_list',$data);
    }
    public function amc_add_free_service($request , $id)
    {
        $data['getrecord'] = Amc::get_single($id);
        return view('admin.amc.free_service_add',$data);

    }
    public function amc_store_free_service($request)
    {
        //dd($request->all());
        $insert_r = request()->validate([
            'amc_id' => 'required',
            'name' => 'required',
            'limits' => 'required',
            'price' => 'required',
        ]);
        $insert_r = new AmcFreeService;
        $insert_r->amc_id = trim($request->amc_id);
        $insert_r->name = trim($request->name);
        $insert_r->limit = trim($request->limit);
        $insert_r->price = trim($request->price);
        $insert_r-> save();

        return redirect ('admin/amc/add_free_service'.$request->amc_id)->with('success','AMC Free successfully save');
    }
    public function edit_free_service($id)
    {
        $data['getrecord'] = AmcFreeService::get_single($id);
        return view('admin.amc.free_service_edit',$data);
    }
    public function amc_update_free_service($request , $id)
    {

        $update = AmcFreeService::get_single($id);
        $update->name = trim($request->name);
        $update->limit = trim($request->limit);
        $update->price = trim($request->price);
        $update-> save();
        return redirect ('admin/amc/add_free_service'.$request->amc_id)->with('success','Free service update successfully');
    }
    public function amc_delete_free_service($id)
    {
        $delete_service = AmcFreeService::get_single($id);
        delete_service->delete();
        return redirect()->back()->with('error','Record successfully deleted');
    }
}
