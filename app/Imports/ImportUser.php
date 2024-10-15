<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
//    public function model(array $row)
//    {
//        return new User([
//            'name' => $row[0],
//            'email' => $row[1],
////            'password' => Hash::make($row[2]),
//            'password' => bcrypt($row[2]),
//        ]);
//    }

    public function model(array $row)
    {
        if(count($row) >= 3) {
            return new User([
                'name' => $row[0],
                'email' => $row[1],
                'password' => Hash::make($row[2]),
            ]);
        }
        // Return null if the row doesn't have enough elements
        return null;
    }
}
