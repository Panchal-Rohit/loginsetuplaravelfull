<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Video;
use App\Models\ContactMessage;
use App\Models\NewsEvent;
use App\Models\Admission;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}