<?php

namespace App\Imports;

use App\Models\Event;
use App\Models\EventLogs;
use App\Http\Requests\EventRequest;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class RequestUpdateImport implements ToModel, WithHeadingRow
{
    use Importable;
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
    }

    // public function map($invoice): array
    // {
    //     return [
    //         $invoice->invoice_number,
    //         Date::dateTimeToExcel($invoice->created_at),
    //         $invoice->total
    //     ];
    // }
    
    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_DATE_YYYYMMDD,
            'D' => NumberFormat::FORMAT_DATE_YYYYMMDD,
        ];
    }

    
}
