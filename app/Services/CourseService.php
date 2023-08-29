<?php

namespace App\Services;

use App\Repositories\CourseRepository;

class CourseService
{
    public function __construct(
        private CourseRepository $CourseRepository
    ) {
    }

    public function getCoursesData()
    {
        return $this->CourseRepository->getAllCourseData();
    }
}
