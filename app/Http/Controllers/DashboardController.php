<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $users = [
            [
                "name" => "John",
                "email" => "john@email.com",
            ],
            [
                "name" => "Jane",
                "email" => "jane@email.com",
            ],
            [
                "name" => "Atul",
                "email" => "atul@email.com",
            ],
        ];

        return view('welcome', ['users' => $users]);
    }
}
