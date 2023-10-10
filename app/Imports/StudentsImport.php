<?php
namespace App\Imports;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Http\Controllers\StudentController;
use Hash;


class StudentsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $student= new Student();
        $student->student_no = $row[0];
        $student->student_name = $row[1];
        $student->student_lastname = $row[2];
        $student->student_gender = $row[3];
        $student->student_class = $row[4];
        $student->stu_school_id = session('teacher')->te_school_id;

        if (Student::where('student_no', '=', $row[0])->exists()) {
            return null;
        }
        else  {
            $student->save();
        }


        // return new Student([
        //     'student_no'    => $row[0],
        //     'student_name'    => $row[1],
        //     'student_lastname'    => $row[2], 
        //     'student_gender' => $row[3], 
        //     'student_class' => $row[4], 
        //     'stu_school_id' => session('teacher')->te_school_id,
        // ]);
    }
}