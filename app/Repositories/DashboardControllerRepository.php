<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\DashboardControllerInterface;

class DashboardControllerRepository implements DashboardControllerInterface
{
    public function admin_dashboard($request)
    {
        return view('admin.dashboard.index');

    }

    public function user_dashboard($request)
    {
        return view('user.dashboard.index');
    }
    public function vendor_dashboard($request)
    {
        return view('vendor.dashboard.index');
    }
}
