<?php
namespace App\Services\Csv;

use Illuminate\Http\Request;
use App\Survey;


class CsvGenerator
{

    protected $file;
    protected $model;

    /**
     * Sets the file path for the related model
     * @param $model
     * return void
     */
    public function __construct($model)
    {
        $this->setFile($model::file);
        $this->model = $model;
    }

    /**
     * Reads the csv file
     * @param array csv file
     * @return array
     */
    public function readCsv()
    {
        $file_handle = fopen($this->file, 'r');
        while (!feof($file_handle)) {
            $line_of_text[] = fgetcsv($file_handle, 1024);
        }
        fclose($file_handle);
        return $line_of_text;
    }

    /**
     * Generates the http post request from survey form
     * @param Request $data
     * @param class instance $model
     * @return boolean
     */
    public function writeCsv($data)
    {

        $file_handle = fopen($this->file, 'a');
        $csvFile = $this->readCsv();
        $counter = 1;
        $row = array_intersect_key($data, $this->model->getFillable());
        fputcsv($file_handle, $row);
        fclose($file_handle);
        Log:
        info('A new row has been inserted.');
        return true;
    }

    /**
     * Setting the file for using to write
     * @param string $fileName
     * @return void;
     */
    public function setFile($fileName)
    {
        $this->file = storage_path($fileName);
    }

}