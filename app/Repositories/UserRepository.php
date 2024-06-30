<?php
namespace App\Repositories;

use App\Models\AMC;
use App\Models\User;
use Illuminate\Support\Str;
use App\Interfaces\UserInterface;
use File;


class UserRepository implements UserInterface
{
    public function user_list($request)
    {
        $data['getrecord'] = User::get_record_user($request);
        return view('admin.user.list',$data);
    }

    public function user_add($request)
    {
        $data['getAMC'] = AMC::get_record_delete();
        return view('admin.user.add',$data);
    }

    public function user_store($request)
    {
        $user = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'amc_id' => 'required',
            'mobile' => 'required',
        ]);
        $DataAmc = AMC::where('id', '=', $request->amc_id)->first();
        $UserDesc = User::orderBy('id','DESC')->where('amc_id','=',$request->amc_id)->first();
        $user = new User;
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->mobile = trim($request->mobile);
        $user->address = trim($request->address);
        $user->amc_bussness_category_name = trim($request->amc_bussness_category_name);

        if(!empty($request->file('profile')))
        {
            $file = $request->file('profile');
            $randomStr = Str::random(30);
            $filename = $randomStr. '.'. $file->getClientOriginalExtension();
            $file->move('upload/profile/',$filename);
            $user->profile = $filename;
        }
        if(!empty($UserDesc))
        {
            $user->account_number = $UserDesc->account_number +1;
        }else{
            $user->account_number = trim($DataAmc->series);
        }
        $user->amc_id = trim($request->amc_id);
        $user->is_admin = 0;
        $user->remember_token = Str::random(50);
        $user->forgot_token = Str::random(50);
        $user->save();
        return redirect('admin/user/list')->with('success','User Successfully  register');

    }
    public function user_edit($id)
    {
        $data['getrecord'] = User::get_single($id);
        $data['getAMC'] = AMC::get_record_delete();
        return view('admin.user.edit',$data);
    }
    public function user_edit_store($request,$id)
    {
        $insert_r = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
        ]);
        $insert_r = User::get_single($id);
        $insert_r->name = trim($request->name);
        $insert_r->last_name = trim($request->last_name);
        $insert_r->email = trim($request->email);
        $insert_r->mobile = trim($request->mobile);
        if(!empty($request->file('profile')))
        {
            if(!empty($insert_r->profile) && file_exists('upload/profile/'.$insert_r->profile))
            {
                unlink('upload/profile/'.$insert_r->profile);
            }
            $file = $request->file('profile');
            $randomStr = Str::random(30);
            $filename = $randomStr. '.'. $file->getClientOriginalExtension();
            $file->move('upload/profile/',$filename);
            $insert_r->profile = $filename;
        }

        $insert_r->address = trim($request->address);
        $insert_r->save();

        return redirect('admin/user/list')->with('success','User Successfully Update');

    }
    public function user_delete($id)
    {
        $user = User::get_single($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/user/list')->with('error','User Successfully Delete');

    }
}
