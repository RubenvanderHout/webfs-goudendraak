<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class MenuController extends Controller
{
    public function exportToPDF(){
        $categories = Category::with('dishes')->get();
        $pdf = Pdf::loadView('menu.pdf',compact('categories'));
        return $pdf->download('menu.pdf');
    }
}
