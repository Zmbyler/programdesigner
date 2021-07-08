<?php

namespace App\Imports;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
//use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Exercise;
use App\Category;
use App\TrainingAge;
use App\AthleteProfile;
use App\BlockFocus;

class ExerciseDataImport implements ToCollection, WithStartRow
{
	public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $rows)
    {
        return $rows[0];
    }

}