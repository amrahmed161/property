<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\BookServiceInterface;

class BookServiceController extends Controller
{
    private BookServiceInterface $bookservice;

    public function __construct(BookServiceInterface $bookservice)
    {
        $this->BookService = $bookservice;
    }
    public function book_service_add(Request $request)
    {
        return $this->BookService->book_service_add($request);
    }


    public function sub_category_dropdown(Request $request)
    {
        return $this->BookService->sub_category_dropdown($request);
    }


    public function book_service_store(Request $request)
    {
        return $this->BookService->book_service_store($request);
    }

    public function service_history_list(Request $request)
    {
        return $this->BookService->service_history_list($request);
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
