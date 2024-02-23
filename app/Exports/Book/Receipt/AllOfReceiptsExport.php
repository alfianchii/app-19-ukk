<?php

namespace App\Exports\Book\Receipt;

use App\Models\RecBookReceipt;
use Maatwebsite\Excel\Concerns\{
    Exportable,
    WithProperties,
    WithTitle,
    FromCollection,
    WithHeadings,
    WithMapping,
    WithCustomValueBinder,
    WithStyles,
};
use PhpOffice\PhpSpreadsheet\Cell\{
    DefaultValueBinder,
    Cell,
    DataType,
};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AllOfReceiptsExport extends DefaultValueBinder
implements WithProperties, FromCollection, WithTitle, WithHeadings, WithMapping, WithCustomValueBinder, WithStyles
{
    use Exportable;

    public function properties(): array
    {
        return [
            'title'          => 'All of Receipts Export',
            'description'    => "Total of receipts which have created on Lidia",
            'subject'        => 'Receipts',
            'keywords'       => 'Receipts,export,spreadsheet',
            'category'       => 'Receipts',
        ];
    }

    public function collection()
    {
        return RecBookReceipt::with(['book', "user", "createdBy"])
            ->get();
    }

    public function title(): string
    {
        return "All of Receipts";
    }
    public function headings(): array
    {
        return [
            'Reader',
            'Book',
            'Amount',
            'Status',
            'From',
            'To',
            'Returned at',
            'Created by',
            'Created at',
        ];
    }
    public function map($receipt): array
    {
        return [
            $receipt->user->name,
            $receipt->book->title,
            $receipt->amount,
            $receipt->status,
            $receipt->from_time->format("j F Y"),
            $receipt->to_time->format("j F Y"),
            $receipt->date_returned ? $receipt->date_returned->format("j F Y") : "-",
            $receipt->createdBy->name,
            $receipt->created_at->format('j F Y, \a\t H.i'),
        ];
    }
    public function bindValue(Cell $cell, $value)
    {
        // Convert numeric into text
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);
            return true;
        }

        // Return default behavior
        return parent::bindValue($cell, $value);
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle("1")->getFont()->setBold(true);
    }
}
