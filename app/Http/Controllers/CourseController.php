<?php

namespace App\Http\Controllers;

use App\Services\CourseService;

class CourseController extends Controller
{
    //

    public function __construct(
        private CourseService $CourseService
    ) {
    }

    public function list()
    {
        $coursesData = $this->CourseService->getCoursesData();

        return response()->json(
            [
            'status' => 'success',
            'message' => null,
            'data' => $coursesData],
            200
        );
    }
}
