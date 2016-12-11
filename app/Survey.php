<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\Csv\CsvGenerator;

class Survey extends Model
{
    /**
     * What if users posts unnecessary fields?
     * What if we want to make titles dynamic and sort the values as we want just shuffle the array below ?
     * $fillable
     */
    protected $fillable = ['name' => 'Name','gender' => 'Gender','phone' => 'Phone','email' => 'Email','address' => 'Address','nationality' => 'Nationality','dob' => 'Date of birth','education' => 'Education background','contact_mode'=>'Preferred mode of contact'];
    const file = "survey/datas.csv";


    public function getFillable()
    {
        return $this->fillable;
    }

    public function listAll()
    {
        $csvGenerator = new CsvGenerator($this);
        return $csvGenerator->readCsv();
    }


}
