<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Services\Csv\CsvGenerator;
use Illuminate\Validation\Factory;
use App\Survey;
class SurveyRequest extends Request
{

    public function __construct(Factory $factory)
    {
        $factory->extend(
            'csvUnique',
            function ($attribute, $value, $parameters) {
                $survey = new Survey();
                $csvController = new CsvGenerator($survey);
                $csvDatas = $csvController->readCsv();
                $key = '';
                if (count($csvDatas) > 0) {
                    $counter = 0;

                    foreach ($csvDatas as $csvData) {
                    if($counter == 0)
                    {
                        $key = array_search('Email', $csvData);

                    } else{

                            if ($value == $csvData[$key]) {
                                return false;
                            }
                        }
                        $counter++;
                    }
                    return true;
                }
            },
            'The email already exists'
        );
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|csvUnique', // what if your fingerprint is not unique?
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'education' => 'required',
            'contact_mode' => 'required',
            'nationality' => 'required',
        ];
    }
}
