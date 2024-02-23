<?php

namespace App\Exports\Book;

use App\Models\MasterBook;
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

class AllOfBooksExport extends DefaultValueBinder
implements WithProperties, FromCollection, WithTitle, WithHeadings, WithMapping, WithCustomValueBinder, WithStyles
{
    use Exportable;

    public function properties(): array
    {
        return [
            'title'          => 'All of Books Export',
            'description'    => "Total of books which have registered on Lidia",
            'subject'        => 'Books',
            'keywords'       => 'Books,export,spreadsheet',
            'category'       => 'Books',
        ];
    }

    public function collection()
    {
        return MasterBook::with(['genres', "wishlists", "reviews", "createdBy"])
            ->get();
    }


    // ---------------------------------
    // UTILITIES
    public function title(): string
    {
        return "All of Books";
    }
    public function headings(): array
    {
        return [
            'Title',
            'Author',
            'Publisher',
            'Year',
            'Synopsis',
            'Stock',
            'Wishlist(s)',
            'Review(s)',
            'Created by',
            'Created at',
        ];
    }
    public function map($book): array
    {
        return [
            $book->title,
            $book->author,
            $book->publisher,
            $book->year_published,
            strip_tags($book->synopsis),
            $book->stock,
            $book->wishlists->count(),
            $book->reviews->count(),
            $book->createdBy->full_name,
            $book->created_at->format('j F Y, \a\t H.i'),
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
