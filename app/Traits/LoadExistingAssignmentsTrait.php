<?php

namespace App\Traits;

trait LoadExistingAssignmentsTrait {
    protected function loadExistingAssignments($existingassignments)
    {
        $existingassignments = $existingassignments->map( function ($assignment) {
            return [
                'id' => $assignment->id,
                'car_registration_number' => $assignment->car->registration_number,
                'car_id' => $assignment->car->id,
                'category_name' => $assignment->category->category_name,
                'category_id' => $assignment->category->id,
                'mechanic_name' => $assignment->mechanic->name,
                'mechanic_id' => $assignment->mechanic->id,
            ];
        });

        return $existingassignments;
    }
}