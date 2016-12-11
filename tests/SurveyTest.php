<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Http\Controllers\CsvConverterController;

class SurveyTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function surveyIndexTests()
    {
        $this->visit('/')
            ->see('Survey');
    }
    /**
     * Checking detail page
     * @return void
     */
    public function surveyDetailTests()
    {
        $csvController = new CsvConverterController;
        $filePath = storage_path($csvController::file);
        $data = ['ujwal dhakal', 'kevin.ujwal@gmail.com', 'male',
            '9840058278', 'lagan tole', '02-07-1996', 'bachelor 4th year', 'email', 'hindi'];
        $csvController->writeCsv($filePath, $data);
        $this->visits('/')
            ->click('click here')
            ->see('kevin.ujwal@gmail.com');
    }
    /**
     * Checking add page
     * @return void
     */
    public function surveyAddTests()
    {
        $this->visit('survey/form')
            ->type('Ujwal Dhakal', 'name')
            ->type('kevin.ujwal@gmail.com', 'email')
            ->select('male', 'gender')
            ->type('9840058278', 'phone')
            ->type('Lagan Tole', 'address')
            ->type('02-07-1996', 'dob')
            ->type('bachelor 4th year', 'education')
            ->select('email', 'contact_mode')
            ->type('hindu', 'nationality')
            ->press('All Religion')
            ->seePageIs('/survey');
    }
}