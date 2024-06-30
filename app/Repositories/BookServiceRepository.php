<?php
namespace App\Repositories;
use App\Models\AMC;
use App\Models\Category;
use App\Models\ServiceType;
use App\Models\Book_service;
use App\Models\Book_service_image;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\BookServiceInterface;




class BookServiceRepository implements BookServiceInterface
{
    public function book_service_add($request)
    {
        $data['getServiceType'] = ServiceType::get_record_delete();
        $data['getCategory'] = Category::get_record_delete();
        $data['getAMC'] = AMC::where('id','=',Auth::user()->amc_id)->first();
        return view('user.book_service.add',$data);
    }

    public function sub_category_dropdown($request)
    {
        $data['get_sub_category'] = subCategory::where('category_id',$request->cat_id)->get(["name","id"]);
        return response()->json($data);
    }

    public function book_service_store($request)
    {
        $r_insert = new Book_service;
        $r_insert->user_id = Auth::user()->id;
        $r_insert->service_type_id = trim($request->service_type_id);
        $r_insert->category_id = trim($request->category_id);
        $r_insert->sub_category_id = trim($request->sub_category_id);
        $r_insert->amc_free_service_id = trim($request->amc_free_service_id);
        $r_insert->description = trim($request->description);
        $r_insert->spacial_instructions = trim($request->spacial_instructions);
        $r_insert->pat = trim($request->pet);
        $r_insert->available = trim($request->available);
        $r_insert->spacial_instructions = trim($request->spacial_instructions);
        $r_insert->save();

        if(!empty($request->option)){
            foreach ($request->option as $value){
                if(!empty($value['attachment_image'])){
                    $option_ind = new Book_service_image;
                    $option_ind->book_service_id = $r_insert->id;
                    $file = $value['attachment_image'];
                    $randomStr = Str::random(30);
                    $filename = $randomStr . '.' . $file->getClientOriginalExtension();
                    $file->move('upload/service/',$filename);
                    $option_ind->attachment_image = $filename;
                    $option_ind->save();
                }
            }
        }
            return redirect('user/service_history/list')->with('success','Record Successfully create');

    }

    public function service_history_list($request)
    {
        $data['getrecord'] = Book_service::getBookService(Auth::user()->id,$request);
        return view('user.book_service.list',$data);
    }
}
