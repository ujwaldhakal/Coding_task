<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SurveyTest extends TestCase
{

    /**
     * Checking add page
     * @return void
     */
    public function testSurveyAdd()
    {
        $this->visit('/survey/form')
            ->type('Ujwal Dhakal', 'name')
            ->type('kevin.ujwal@gmail.com', 'email')
            ->select('m', 'gender')
            ->type('9840058278', 'phone')
            ->type('Lagan Tole', 'address')
            ->type('02-07-1996', 'dob')
            ->type('bachelor 4th year', 'education')
            ->select('Email', 'contact_mode')
            ->type('hindu', 'nationality')
            ->press('submit')
            ->seePageIs('/survey/form');
    }
}
