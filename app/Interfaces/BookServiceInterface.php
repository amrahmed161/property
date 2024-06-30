<?php

namespace App\Interfaces;

interface BookServiceInterface
{
    public function book_service_add($request);
    public function sub_category_dropdown($request);
    public function book_service_store($request);
    public function service_history_list($request);
}
