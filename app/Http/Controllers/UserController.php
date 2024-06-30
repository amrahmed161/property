<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\UserInterface;

class UserController extends Controller
{
    private UserInterface $user;

    public function __construct(UserInterface $user)
    {
        $this->User = $user;
    }
    public function user_list(Request $request)
    {
        return $this->User->user_list($request);
    }


    public function user_add(Request $request)
    {
        return $this->User->user_add($request);
    }


    public function user_store(Request $request)
    {
        return $this->User->user_store($request);
    }


    public function user_edit( $id)
    {
        return $this->User->user_edit($id);
    }

    public function user_edit_store( Request $request,$id)
    {
        return $this->User->user_edit_store($request,$id);
    }


    public function user_delete( $id)
    {
        return $this->User->user_delete($id);
    }
}
