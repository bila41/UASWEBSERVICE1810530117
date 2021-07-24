<?php

namespace App\Http\Controllers\API;
use App\Barang;
use App\Pesanan;
use App\pesanan_detail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
class detailpesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return pesanan_detail::all();
    }

}