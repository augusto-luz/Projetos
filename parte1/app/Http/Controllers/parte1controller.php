<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class parte1controller extends Controller
{
    public function dataHora() {
        return date('d-m-Y H:i:s');
    }
}