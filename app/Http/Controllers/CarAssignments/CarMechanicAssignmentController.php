<?php

namespace App\Http\Controllers\CarAssignments;
use App\Models\Car;
use App\Models\Mechanic;
use App\Models\Category;
use App\Models\CarMechanicAssignment;
use App\Traits\LoadExistingAssignmentsTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\UpdateAssignmentRequest;
use Illuminate\Http\Request;

class CarMechanicAssignmentController extends Controller
{
    use LoadExistingAssignmentsTrait; 

    public function index(){
        $assignments = CarMechanicAssignment::get();

        if($assignments->isNotEmpty()){
            $assignments = $this->loadExistingAssignments($assignments);
        }

        $cars = Car::all();
        $categories = Category::all();
        $mechanics = Mechanic::all();

        return view('cars.assignments', compact('assignments', 'cars', 'categories', 'mechanics')); 
    }

    public function store(StoreAssignmentRequest $request)
    {
        $assignmentData = $request->validated(); 

        CarMechanicAssignment::create($assignmentData);

        $existingassignments = CarMechanicAssignment::get();

        $existingassignments = $this->loadExistingAssignments($existingassignments);

        return response()->json(['existingassignments' =>$existingassignments]);
    }

    public function update(UpdateAssignmentRequest $request){ 
        $updateData = $request->validated(); 

        $assignment = CarMechanicAssignment::findOrFail($updateData['id']);

        $assignment->update($updateData);

        $existingassignments = CarMechanicAssignment::get();

        $existingassignments = $this->loadExistingAssignments($existingassignments);

        return response()->json(['existingassignments' =>$existingassignments]);
    }

    public function destroy($id){ 
        $assignment = CarMechanicAssignment::findOrFail($id);
        
        $assignment->delete();

        $existingassignments = CarMechanicAssignment::get();

        if($existingassignments->isNotEmpty()){
            $existingassignments = $this->loadExistingAssignments($existingassignments);
        }

        return response()->json(['existingassignments' =>$existingassignments]);
    }
}
