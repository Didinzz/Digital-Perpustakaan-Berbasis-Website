<?php

namespace App\Exports;

use App\Models\Buku;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class BukuExport implements FromView, WithColumnWidths, WithStyles, WithDrawings
{
    protected $bukus;

    public function __construct()
    {
        $this->bukus = Buku::with('kategori')->get();
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('pages.export.excel', [
            'bukus' => Buku::with('kategori')->get()
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 30,
            'C' => 35,
            'D' => 20,
            'E' => 20,
            'F' => 60,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $titleStyleArray = [
            'font' => [
                'bold' => true,
                'size' => 16,
                'color' => ['argb' => Color::COLOR_BLACK],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];

        $sheet->getStyle('A1:F1')->applyFromArray($titleStyleArray);
        $sheet->mergeCells('A1:F1');

        $headerStyleArray = [
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF0000FF'],
            ],
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFFFF'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],

        ];

        $sheet->getStyle('A2:F2')->applyFromArray($headerStyleArray);
        $sheet->getRowDimension(2)->setRowHeight(20);
        $sheet->getStyle('F')->getAlignment()->setWrapText(true);
        $sheet->getStyle('C')->getAlignment()->setWrapText(true);

        $rowCount = $sheet->getHighestRow();
        for ($i = 3; $i <= $rowCount; $i++) {
            $sheet->getRowDimension($i)->setRowHeight(100);
            $sheet->getStyle("A$i:F$i")->applyFromArray([
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical' => Alignment::VERTICAL_CENTER,
                ]
            ]);
        }

        $sheet->getStyle('A2:F' . $rowCount)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);
    }

    public function drawings()
    {
        $drawings = [];
        $row = 3;
        foreach ($this->bukus as $buku) {
            $coverPath = 'storage/cover_buku/' . basename($buku->cover_buku);
            if (file_exists(public_path($coverPath))) {
                $drawing = new Drawing();
                $drawing->setName($buku->judul_buku);
                $drawing->setDescription('Cover Buku');
                $drawing->setPath(public_path($coverPath));
                $drawing->setHeight(100);
                $drawing->setCoordinates('B' . $row);
                $drawing->setOffsetX(20);
                $drawing->setOffsetY(20);
                $drawings[] = $drawing;
            }
            $row++;
        }
        return $drawings;
    }
}
