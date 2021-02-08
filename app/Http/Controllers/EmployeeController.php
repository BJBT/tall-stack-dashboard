<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);

        return view('employee', compact('employees'));
    }

    public function update()
    {
        $employee_values = request('employees');

        foreach ($employee_values as $key => $employee_value)
        {
            $employee = Employee::find($key);

            $file = $employee_value['badge_image'] ?? null;

            if ($file)
            {
                $fileNameWithExt = $file->getClientOriginalName();
                $fileName        = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension       = $file->getClientOriginalExtension();
                $storedName      = $fileName . '.' . $extension;
                $stored_file     = Storage::putFileAs("uploaded_files/employee_images", $file, $storedName);
                $employee->update([
                    'badge_image' => $stored_file,
                ]);
            }

            $employee->update([
               'mobile' => $employee_value['mobile'],
               'start_date' => $employee_value['start_date'],
               'salary' => $employee_value['salary']
            ]);
        }

        return redirect()->back();
    }
}
