<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    public function getAllCourseData()
    {
        return Course::All();
    }
}
