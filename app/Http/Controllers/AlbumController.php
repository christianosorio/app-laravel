<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class AlbumController extends Controller
{
    public function index(Request $request)
    {
        $url = 'https://jsonplaceholder.typicode.com/photos';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($curl);
        $explode_id = json_decode($data, true);

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $itemCollection = collect($explode_id);
        $perPage = 10;
        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
        $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
        $paginatedItems->setPath($request->url());

        return view('albums.index', ['albums' => $paginatedItems]);
    }
}
