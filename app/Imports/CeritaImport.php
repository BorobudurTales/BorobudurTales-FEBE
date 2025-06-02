<?php

namespace App\Imports;

use App\Models\Cerita;
use Maatwebsite\Excel\Concerns\ToModel;

class CeritaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cerita([
            'tema'=> $row[0],
            'cerita'=> $row[1],
            'makna'=> $row[2],
        ]);
    }
}
