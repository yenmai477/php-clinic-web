<?php

namespace App;

use App\PhieuKhamBenh;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class DSKhamBenhExcel implements WithHeadings, FromQuery, WithMapping, ShouldAutoSize, WithEvents
{

  use Exportable;

  public function __construct(string $ngay)
  {
    $this->ngay = $ngay;
  }

  public function query()
  {
    return PhieuKhamBenh::query()->where('NgayKham', $this->ngay);
  }

  // set the headings
  public function headings(): array
  {
    return [
      'Họ & Tên', 'Giới tính', 'Năm sinh', 'Địa chỉ'
    ];
  }

  public function map($row): array
  {
    $gioitinh = 'Nam';

    if ($row->benhnhan->gioitinh === 1) {
      $gioitinh = 'Nữ';
    }

    return [
      $row->benhnhan->HoTen,
      $gioitinh,
      $row->benhnhan->NamSinh,
      $row->benhnhan->DiaChi

    ];
  }

  public function registerEvents(): array
  {
    return [
      AfterSheet::class    => function (AfterSheet $event) {
        $styleArray = [
          'font' => [
            'bold' => true,
          ],
        ];

        $event->sheet->getDelegate()->setTitle(date_format(date_create($this->ngay), 'd_m_Y'))->getStyle('A1:D1')->applyFromArray($styleArray);
      },
    ];
  }
}
