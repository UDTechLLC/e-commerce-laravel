<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BillingExport;
use App\Http\Controllers\Controller;

class ExportController extends Controller
{
    /**
     * @return mixed
     */
    public function exportBilling()
    {
        return \Excel::download(new BillingExport(), now()->format('Y-m-d H:i:s') . '_billings.csv');
    }
}
