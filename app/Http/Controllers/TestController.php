<?php

namespace App\Http\Controllers;

use App\Mail\AlertAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{

	public function index(){
		dd(storage_path(),base_path());
		return view('test');
	}

    public function ship()
    {
        Mail::to('admin@admin.com')->send(new AlertAdmin());
    }
}
