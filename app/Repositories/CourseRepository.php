<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    public function getAllCourseData()
    {
        return Course::All();
    }

    public function getCourseDataBylecturerID($lecturerID)
    {
        return Course::where('lecturerID', $lecturerID)->get();
    }

    public function getCourseDatabyID($courseID)
    {
        return Course::find($courseID);
    }

    public function storeCourse($courseData)
    {
        return Course::create($courseData);
    }

    public function updateCourse($courseData, $courseID)
    {
        return Course::find($courseID)->update($courseData);
    }

    public function deleteCourse($courseID)
    {
        return Course::find($courseID)->delete();
    }
}
