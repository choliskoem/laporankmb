<?php

namespace App\Exports;

use App\Models\Content;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ContentExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    public function headings(): array
    {
        return [
            'NO',
            'TANGGAL',
            'EDITOR KONTEN',
            'EDITOR COVER',
            'NARATOR',
            'PRESENTER',
            'PENULIS NASKAH',
            'NARSUM',
            'KAMERAMEN',
            'SWITCHER',
            'JUDUL',
            'ACARA',
            'KLASIFIKASI',
            'MEDSOS',
            'LINK',
            'FORMAT',
        ];
    }

    public function collection()
    {
        $data = Content::with([
            'program',
            'klasifikasi',
            'medsos',
            'format',
            'roles.person',
        ])->get();

        $output = [];
        $no = 1;

        foreach ($data as $item) {
            $output[] = [
                $no++,
                $item->tanggal,
                $item->getPersonName('editor_konten'),
                $item->getPersonName('editor_cover'),
                $item->getPersonName('narator'),
                $item->getPersonName('presenter'),
                $item->getPersonName('penulis_naskah'),
                $item->getPersonName('narasumber'),
                $item->getPersonName('kameramen'),
                $item->getPersonName('switcher'),
                $item->judul,
                $item->program->nama_program ?? '-',
                $item->klasifikasi->nama_klasifikasi ?? '-',
                $item->medsos->nama_medsos ?? '-',
                $item->link,
                $item->format->nama_format ?? '-',
            ];
        }

        return collect($output);
    }

    public function styles(Worksheet $sheet)
    {
        // Header style
        $sheet->getStyle('A1:P1')->applyFromArray([
            'font' => ['bold' => true],
            'fill' => [
                'fillType' => 'solid',
                'color' => ['rgb' => 'E8EEF1'],
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical'   => 'center',
            ],
        ]);

        // Border untuk semua data
        $lastRow = $sheet->getHighestRow();
        $sheet->getStyle("A1:P{$lastRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'thin',
                    'color' => ['rgb' => '333333'],
                ],
            ],
        ]);

        return [];
    }
}
