<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;


class ExportDailyOrders extends Command
{

    protected $signature = 'app:export-daily-orders';
    protected $description = 'Command description';


    public function handle()
    {
        $fileName = 'orders-' . now()->format('Y-m-d') . '.xlsx';
        $path = 'orders/' . $fileName;

        // Store the file in the 'public/orders' directory
        Excel::store(new OrdersExport, $path, 'public');

        $this->info('Daily orders exported successfully!');
    }
}
