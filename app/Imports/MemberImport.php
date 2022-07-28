<?php

namespace App\Imports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class MemberImport implements ToModel, WithHeadingRow, WithStartRow, WithCustomCsvSettings
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter'  => ';'
        ];
    }

    public function model(array $row)
    {
        return new Member([
            'name' => $row['name'],
            'group_id' => $row['group_id'],
            'email' => $row['email'],
            'phone_number' => $row['phone_number'],
            'address' => $row['address']
        ]);
    }
}
