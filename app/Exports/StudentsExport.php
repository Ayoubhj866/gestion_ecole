<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentsExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    use Exportable;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Student::with('filiere')->get();
    }

    public function map($student): array
    {
        return [
            $student->nom,
            $student->prenom,
            $student->email,
            $student->filiere->name,
        ];
    }

    public function headings(): array
    {
        return [
            'nom',
            'prenom',
            'email',
            'filiere',
        ];
    }
}
