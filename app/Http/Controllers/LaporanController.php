<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use Illuminate\Http\Request;

// require_once __DIR__ . '/vendor/autoload.php';

class LaporanController extends Controller
{
    public function index() {
        $mpdf = new Mpdf();
        $mpdf->WriteHTML('<h1>Hello world!</h1>');
        $mpdf->Output();
    }
}
