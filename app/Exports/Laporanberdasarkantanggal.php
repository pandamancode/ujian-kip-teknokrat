<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use App\Models\Pendaftar;
use App\Models\Fakultas;
use App\Models\Jalur;
use \Maatwebsite\Excel\Writer;

class Laporanberdasarkantanggal implements FromView, ShouldAutoSize, WithEvents
{
    protected $fromDate;
    protected $toDate;

    function __construct($request) {
        $this->fromDate = $request->tanggal_sekarang;
        $this->toDate = $request->tanggal_mendatang;
    }

    public function view(): View
    {
        $dari =$this->fromDate;
        $sampai  =$this->toDate;
        $fakultas = Fakultas::get();

        $jalur = Jalur::get();

        $pendaftar = Pendaftar::whereBetween("tanggal_daftar",[$dari, $sampai])->get();

        return view('admin.laporan.cetak_berdasarkan_tanggal', compact(
            'pendaftar',
            'dari',
            'sampai',
            'jalur',
            'fakultas',
        ));
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $styleHeader = [
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ]
                ];
                
                $event->sheet->mergeCells('A1:W1');
                $event->sheet->getDelegate()->getStyle('A1:W1')->applyFromArray($styleHeader);

                $styleTableHeader = [
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ];

                $event->sheet->getDelegate()->getStyle('A3:W5')->applyFromArray($styleTableHeader);

                $styleTableUtama = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ];

                $to = $event->sheet->getDelegate()->getHighestColumn();
                for ($i = 'A'; $i !=  $to; $i++) {
                    $event->sheet->getDelegate()->getColumnDimension($i)->setAutoSize(true);
                }
                $event->sheet->getDelegate()->getStyle('A6:'.$to.'19')->applyFromArray($styleTableUtama);
                
                $styleTableFooter = [
                    'font' => [
                        'bold' => true,
                    ],
                ];

                $event->sheet->getDelegate()->getStyle('A19:W19')->applyFromArray($styleTableFooter);

                // $styleTableBantu = [
                //     'alignment' => [
                //         'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                //     ],
                //     'borders' => [
                //         'allBorders' => [
                //             'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                //         ],
                //     ],
                // ];

                // $event->sheet->getDelegate()->getStyle('A22:B26')->applyFromArray($styleTableBantu);

                
            },
        ];
    }
}
