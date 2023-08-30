<?php

namespace App\Services;

use App\Repositories\CourseRepository;

class CourseService
{
    public function __construct(
        private CourseRepository $CourseRepository
    ) {
    }

    public function getCoursesData($lecturerID = null)
    {
        if (is_null($lecturerID)) {
            return $this->CourseRepository->getAllCourseData();
        } else {
            return $this->CourseRepository->getCourseDataBylecturerID($lecturerID);
        }
    }
}
