<?php
namespace App\Repositories;

use APP\Models\User;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\VendorType;
use Illuminate\Support\Str;
use App\Interfaces\VendorInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class VendorRepository implements VendorInterface
{
    public function vendor_list($request)
    {
        $data['getrecord'] = User::get_record($request);
        return view('admin.vendor.list', $data);
    }
    public function vendor_add($request)
    {
        $data['getVendorType'] = VendorType::get_record($request);
        $data['getCategory'] = Category::get_record($request);
        return view('admin.vendor.add',$data);
    }

    public function vendor_store($request)
    {
        $user = request()->validate([
            'name' => 'required',
            'email ' => 'required|unique:users',
            'status' => 'required',
            'category_id' => 'required',
            'vendor_type_id' => 'required'
        ]);

        $user  = New User;
        $user->name           =trim($request->name);
        $user->last_name      =trim($request->last_name);
        $user->email          =trim($request->email);
        $user->category_id    =trim($request->category_id);
        $user->vendor_type_id =trim($request->vendor_type_id);
        $user->company_name   =trim($request->company_name);
        $user->employee_id    =trim($request->employee_id);
        $user->mobile         =trim($request->mobile);
        if(!empty($request->file('profile')))
        {
            $file = $request->file('profile');
            $randomStr = Str::random(30);
            $filename = $randomStr. '.'. $file->getClientOriginalExtension();
            $file->move('upload/profile/',$filename);
            $user->profile = $filename;
        }
        $user->status         =trim($request->status);
        $user->always_assign  =trim($request->always_assign);
        $user->is_admin = 2;
        $user->remember_token = Str::random(50);
        $user->forgot_token = Str::random(50);
        $user->save();

        $this->send_vendor_verification_mail($user);

        return redirect ('admin/vendor/list')->with('success','Record successfully caerted');
    }
    public function send_vendor_verification_mail($user)
    {
        Mail::to($user->email)->send(new VendorRegisterMail($user));
    }

    public function vendor_password($request,$token)
    {
        $user = User::where('forgot_token','=',$token);
        if($user->count() == 0){
            abort(403);
        }
        $user = $user->first();

        $data['token'] = $token;

        return view('admin.vendor.password',$data);
    }

    public function vendor_password_post($request,$token)
    {
        $user = User::where('forgot_token','=',$token);
        if($user->count() == 0){
            abort(403);
        }
        $user = $user->first();
        $user->remember_token = Str::random(50);
        $user->forgot_token = Str::random(50);
        $user->password = Hash::make($request->password);
        $user->status = 0;
        $user->save();

        return redirect('/')->with('success','Password has been save.');
    }

    public function vendor_edit($request ,$id)
    {
        $data['getrecord'] = User::get_single($id);
        $data['getVendorType'] = VendorType::get_record($request);
        $data['getCategory'] = Category::get_record($request);
        return view('admin.vendor.edit',$data);
    }

    public function vendor_update($request,$id)
    {
        $insert_r = request()->validate([
            'name' =>'required',
            'email' => 'required|unique:users,email'.$id,
            'status' => 'required',
            'category_id' => 'required',
            'vendor_type_id' => 'required',
        ]);
        $insert_r = User::get_single($id);
        $insert_r->name  = trim($request->name);
        $insert_r->last_name  = trim($request->last_name);
        $insert_r->email  = trim($request->email);
        $insert_r->mobile  = trim($request->mobile);
        if(!empty($request->file('profile'))){

            if(!empty($insert_r->profile) && file_exists('upload/profile/'.$insert_r->profile))
            {
                unlink('upload/profile/' .$insert_r->profile);
            }

            $file  =  $request->file('profile');
            $randomStr = Str::random(30);
            $filename  = $randomStr . '.' . $file->getClientOriginalExtension();
            $file->move('upload/profile/' , $filename);
            $insert_r->profile  = filename;
        }
        $insert_r->category_id  = trim($request->category_id);
        $insert_r->vendor_type_id  = trim($request->vendor_type_id);
        if($request->vendor_type_id == 2)
        {
            $insert_r->company_name = null;
            $insert_r->employee_id = null;
        }else if($request->vendor_type_id == 1)
        {
            $insert_r->company_name = trim($request->company_name);
            $insert_r->employee_id = null;
        }
        if($request->vendor_type_id == 2){
            $insert_r->company_name = null;
            $insert_r->employee_id = null;
        }else if($request->vendor_type_id == 3)
        {
            $insert_r->employee_id = trim($request->employee_id);
            $insert_r->company_name = null;
        }

        $insert_r->status  = trim($request->status);
        $insert_r->always_assign  = trim($request->always_assign);
        $insert_r->save();
        return redirect('admin/vendor/list')->with('success','Record successfully Update');

    }

    public function vendor_delete($id)
    {
        $user = User::get_single($id);
        $user->is_delete = 1;
        $user->save();
        return redirect('admin/vendor/list')->with('success','Record successfully Delete');
    }
}
