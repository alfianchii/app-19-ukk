<?php

namespace App\Exports\Book\Receipt;

use App\Models\RecBookReceipt;
use Maatwebsite\Excel\Concerns\{
  Exportable,
  WithProperties,
  FromCollection,
  WithTitle,
  WithHeadings,
  WithMapping,
  WithStyles,
};
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class YourReceiptsExport implements WithProperties, FromCollection, WithTitle, WithHeadings, WithMapping, WithStyles
{
  use Exportable;

  protected int $idUser;

  public function properties(): array
  {
    return [
      'title'          => 'Your Receipts Export',
      'description'    => "Total of your receipts that have been made on Lidia",
      'subject'        => 'Your Receipts',
      'keywords'       => 'Your Receipts,export,spreadsheet',
      'category'       => 'Your Receipts',
    ];
  }

  public function forIdUser(int $idUser)
  {
    $this->idUser = $idUser;

    return $this;
  }

  public function collection()
  {
    return RecBookReceipt::with(["book", "user", "createdBy"])
      ->whereIdUser($this->idUser)
      ->latest("updated_at")
      ->get();
  }

  public function title(): string
  {
    return "Your Receipts";
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
      $receipt->user->full_name,
      $receipt->book->title,
      $receipt->amount,
      $receipt->status,
      $receipt->from_time->format("j F Y"),
      $receipt->to_time->format("j F Y"),
      $receipt->date_returned ? $receipt->date_returned->format("j F Y") : "-",
      $receipt->createdBy->full_name,
      $receipt->created_at->format('j F Y, \a\t H.i'),
    ];
  }

  public function styles(Worksheet $sheet)
  {
    $sheet->getStyle("1")->getFont()->setBold(true);
  }
}