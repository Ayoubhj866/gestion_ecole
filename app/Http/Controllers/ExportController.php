<?php

namespace App\Http\Controllers;

use App\Exports\InstructeurExport;
use App\Exports\StudentsExport;
use App\Models\Instructeur;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class ExportController extends Controller
{
    public function exportPdf(string $modelName)
    {

        $data = [];
        $fileName = 'list';
        //check the model nale
        if ($modelName === 'students') {
            $data = Student::with('filiere')->get();
        } elseif ($modelName === 'instructeurs') {
            $data = Instructeur::all();
        }

        $pdf = FacadePdf::loadView('admin.pdfs.'.$modelName, ['data' => $data])
            ->setPaper('a4', 'portrait');

        return $pdf->download("$modelName.pdf");
    }

    public function exportExcel(string $modelName)
    {
        if ($modelName === 'students') {
            return (new StudentsExport)->download('students-list.xlsx');
        } elseif ($modelName === 'instructeurs') {
            return (new InstructeurExport)->download('instructeurs-list.xlsx');
        }
    }
}
