<?php

namespace App\Interfaces;

interface DashboardControllerInterface
{
    public function admin_dashboard($request);
    public function user_dashboard($request);
    public function vendor_dashboard($request);
}
