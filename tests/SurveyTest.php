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
        $this->visit('survey')
            ->type('Ujwal Dhakal', 'Name')
            ->type('kevin.ujwal@gmail.com', 'Email')
            ->select('male', 'Gender')
            ->type('9840058278', 'Number')
            ->type('Lagan Tole', 'Address')
            ->type('02-07-1996', 'Date_of_birth')
            ->type('bachelor 4th year', 'Education_background')
            ->select('email', 'Mode_of_contact')
            ->type('hindu', 'Nationality')
            ->press('Submit')
            ->seePageIs('/survey');
    }
}