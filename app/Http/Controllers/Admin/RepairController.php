<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function getHome() {
        return view('admin.repairs.repairs');
    }
    public function postRepairAdd() {
        return view('admin.repairs.repairs');
    }
}
