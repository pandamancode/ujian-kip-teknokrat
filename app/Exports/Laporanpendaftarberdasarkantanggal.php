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

class Laporanpendaftarberdasarkantanggal implements FromView, ShouldAutoSize, WithEvents
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

        return view('admin.laporan.cetak_profil_berdasarkan_tanggal', compact(
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

            },
        ];
    }
}
