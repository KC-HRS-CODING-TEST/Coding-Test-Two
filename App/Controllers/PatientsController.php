<?php

namespace App\Controllers;

use App\Core\App;

class PatientsController{
    public function get($patientId)
    {
        echo('Patient show page for patient '. $patientId);
    }

    public function update($patientId)
    {
        echo('Updating information for patient '. $patientId);
    }

    public function delete($patientId)
    {
        echo('Deleting record for patient '. $patientId);
    }

    public function create($postBody)
    {
        echo('Creating patient '. $postBody);
    }
}