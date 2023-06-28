<?php

namespace App\Traits;

trait LoadExistingAssignmentsTrait {
    protected function loadExistingAssignments($existingassignments)
    {
        $existingassignments = $existingassignments->map( function ($assignment) {
            return [
                'id' => $assignment->id,
                'car' => $assignment->car->registration_number,
                'car_id' => $assignment->car->id,
                'category' => $assignment->category->category_name,
                'category_id' => $assignment->category->id,
                'mechanic' => $assignment->mechanic->name,
                'mechanic_id' => $assignment->mechanic->id,
            ];
        });

        return $existingassignments;
    }
}