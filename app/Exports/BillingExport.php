<?php

declare(strict_types = 1);

namespace App\Exports;

use App\Models\OrderBilling;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

/**
 * Class BillingExport
 * @package App\Exports
 */
class BillingExport implements FromQuery, WithHeadings
{
    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            '#', 'first name', 'last name', 'company', 'email', 'street', 'apartment', 'country', 'iso', 'city',
            'state', 'postcode', 'phone', 'created', 'updated',
        ];
    }

    /**
     * @return Builder
     */
    public function query()
    {
        return OrderBilling::query();
    }
}
