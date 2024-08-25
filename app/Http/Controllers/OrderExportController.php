<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class OrderExportController extends Controller
{
    public function index()
    {
        // Get all files from the 'public/orders' directory
        $files = Storage::disk('public')->files('orders');

        // Pass the files to the view
        return view('downloads.index', compact('files'));
    }

    public function download($file)
    {
        // Check if the file exists in the storage
        if (Storage::disk('public')->exists($file)) {
            return response()->download(storage_path('app/public/' . $file));
        }

        // If the file doesn't exist, show a 404 error
        abort(404);
    }
}
