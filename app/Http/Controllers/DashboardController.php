<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\DashboardControllerInterface;

class DashboardController extends Controller
{
    private DashboardControllerInterface $Dashboard;

    public function __construct(DashboardControllerInterface $Dashboard)
    {
        $this->Dashboard = $Dashboard;
    }
    public function admin_dashboard(Request $request)
    {
        return $this->Dashboard->admin_dashboard($request);
    }

    public function user_dashboard(Request $request)
    {
        return $this->Dashboard->user_dashboard($request);
    }

    public function vendor_dashboard(Request $request)
    {
        return $this->Dashboard->vendor_dashboard($request);
    }

}
