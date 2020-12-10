<?php

namespace App\Controllers;

use App\Core\App;

class PatientsMetricsController {
    public function index($patientId)
    {
        echo('Showing all metrics for patient '. $patientId);
    }

    public function get($patientId, $metricId)
    {
        echo('Showing metric '. $metricId .' for patient '. $patientId);
    }

    public function create($patientId) 
    {
        echo('Creating metrics for patient'. $patientId);
    }

    public function update($patientId, $metricId)
    {
        echo('Updating metric '. $metricId .' for patient '. $patientId);
    }

    public function delete($patientId, $metricId)
    {
        echo('Deleting metric '. $metricId .' for patient '. $patientId);
    }
}