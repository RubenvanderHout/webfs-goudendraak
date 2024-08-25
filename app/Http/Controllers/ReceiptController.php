<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class ReceiptController extends Controller
{
    public function exportToPDF(string $id){
        $table = Table::with(['Orders.Order_Dish.Dish'])->findOrFail($id);
        $customPaper = array(0, 0, 240, 283);
        $pdf = Pdf::loadView('receipt.pdf', [
            'table' => $table,
            'orders' => $table->Orders
        ])->setPaper($customPaper);;
        return $pdf->download('receipt.pdf');
    }
}
