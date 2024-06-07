<?php

namespace App\Exports;

use App\Models\Instructeur;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InstructeurExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Instructeur::with('matieres')->get();
    }

    public function headings(): array
    {
        return [
            'nom',
            'prenom',
            'emai',
        ];
    }

    public function map($instructeur): array
    {
        return [
            $instructeur->nom,
            $instructeur->prenom,
            $instructeur->email,
        ];
    }
}
