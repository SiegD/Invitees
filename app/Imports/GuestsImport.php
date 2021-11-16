<?php

namespace App\Imports;

use App\Models\guest;
use Maatwebsite\Excel\Concerns\ToModel;
use illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class GuestsImport implements
    ToModel,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure

{
    use Importable, SkipsErrors, SkipsFailures;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        return new guest([
            'name' => $row['name'],
            'table_name' => $row['table_name'],
            'total_guest' => $row['total_guest'],
            'email' => $row['email'],
            'phone_number' => $row['phone_number'],
        ]);
    }


    public function rules(): array
    {
        return [
            '*.name' => 'required|unique:guests',
            '*.table_name' => 'required',
            '*.total_guest' => 'required',
            '*.email' => 'required',
        ];
    }
}
