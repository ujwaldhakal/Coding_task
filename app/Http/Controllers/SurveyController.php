<?php

namespace App\Http\Controllers;

use App\Services\Csv\CsvGenerator;
use App\Survey;
use Illuminate\Http\Request;
use App\Http\Requests\SurveyRequest;
use Log;
use Session;

class SurveyController extends Controller
{
    /**
     * Displays the survey form
     * @return view
     */
    public function form1()
    {

        $route = route('saveSurvey');
        $listRoute = route('surveyList');
        Log::info('Viewing the survey form.');
        return view('survey.form')->with(['route' => $route,'listRoute' => $listRoute]);
    }

    public function test4()
    {

        
    }

    public function test44()

    {
        
    }

    /**
     * Loads all the available data in form view
     */
    public function index()
    {
        $survey = new Survey();
        $surveyList = $survey->listAll();
        $route = route('surveyForm');
        return view('survey.list')->with(['surveyList' => $surveyList,'route' => $route]);
    }

    /**
     * Saves the request from survey form
     * @param Request|lluminate\Http\Request $request
     * @return redirection
     */
    public function save(SurveyRequest $request)
    {
        $survey = new Survey;
        $csv = new CsvGenerator($survey);
        $csv->writeCsv($request->all());
        Log::info('A new Survey has been inserted');
        Session::flash('success','Data has been successfully inserted');
        return redirect()->back();
    }

    /**
     * Detail survey based on id
     * @param string $email
     */

        public function detail($email)
    {
        $survey = new Survey();
        $csvGenerator = new CsvGenerator($survey);
        $csvDatas = $csvGenerator->readCsv();
        $key = '';
        if($csvDatas[1][0] !== null) {
            $counter = 0;
            foreach($csvDatas as $csvData) {
                if($counter == 0)
                {
                    $key = array_search('Email', $csvData);

                }
               
                    if ($csvData[$key] == $email) {
                        $fillable = $survey->getFillable();
                        return view('survey.detail')->with(['csvData' => $csvData ,'fillable' => $fillable]);
                    }
                
                $counter++;
            }
            dd('not found');
        } else {
            dd('not found');
        }
   
     }
    
}
