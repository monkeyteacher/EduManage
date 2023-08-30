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

    public function storeCourse($courseData)
    {
        return Course::create($courseData);
    }
}
