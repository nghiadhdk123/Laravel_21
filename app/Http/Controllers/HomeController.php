<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function hallo()
    {
        echo "Hello HomeController"."<br>";

        return view('hello1');
    }

    public function edit($id)
    {
        echo "Edit co id = ".$id;
    }

    public function destroy($id)
    {
        echo "DELETE id = " .$id;
    }
}