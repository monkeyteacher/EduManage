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

    public function storeCoursesData($courseData)
    {
        return $this->CourseRepository->storeCourse($courseData);
    }

    public function updateCoursesData($courseData, $courseID)
    {
        $res = null;
        $course = $this->CourseRepository->getCourseDatabyID($courseID);
        if ($course) {
            $courseData = $this->CourseRepository->updateCourse($courseData, $courseID);
            $res['status'] = 'success';
            $res['data'] = $this->CourseRepository->getCourseDatabyID($courseID);
            return $res;
        } else {
            $res['status'] = 'error';
            $res['message'] = '課程不存在。';
            return $res;
        }
    }

    public function deleteCourseData($courseID)
    {
        $res = null;
        $course = $this->CourseRepository->getCourseDatabyID($courseID);
        if ($course) {
            $result = $this->CourseRepository->deleteCourse($courseID);
            if ($result) {
                $res['status'] = 'success';
            } else {
                $res['status'] = 'error';
                $res['message'] = '刪除失敗。';
            }
            return $res;
        } else {
            $res['status'] = 'error';
            $res['message'] = '課程不存在。';
            return $res;
        }
    }
}
