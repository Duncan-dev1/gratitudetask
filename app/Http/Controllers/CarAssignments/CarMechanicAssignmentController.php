<?php

namespace App\Http\Controllers\CarAssignments;
use App\Models\Car;
use App\Models\Mechanic;
use App\Models\Category;
use App\Models\CarMechanicAssignment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssignmentRequest;
use Illuminate\Http\Request;

class CarMechanicAssignmentController extends Controller
{
    public function index(){
        $assignments = CarMechanicAssignment::get()->map( function ($assignment) {
            return [
                'car' => $assignment->car->registration_number,
                'category' => $assignment->category->category_name,
                'mechanic' => $assignment->mechanic->name,
            ];
        });
        
        $cars = Car::all();
        $categories = Category::all();
        $mechanics = Mechanic::all();

        return view('cars.assignments', compact('assignments', 'cars', 'categories', 'mechanics')); 
    }

    public function store(StoreAssignmentRequest $request)
    {
        $assignmentData = $request->validated(); 

        CarMechanicAssignment::create($assignmentData);

        $existingassignments = CarMechanicAssignment::get()->map( function ($assignment) {
            return [
                'car' => $assignment->car->registration_number,
                'category' => $assignment->category->category_name,
                'mechanic' => $assignment->mechanic->name,
            ];
        });

        return response()->json(['existingassignments' =>$existingassignments]);
    }

    public function update(){

    }

    public function destroy(){

    }
}
