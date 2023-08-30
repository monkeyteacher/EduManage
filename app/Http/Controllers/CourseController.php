<?php

namespace App\Http\Controllers;

use App\Services\CourseService;
use App\Http\Requests\LecturerCoursesRequest;

class CourseController extends Controller
{
    //
    public function __construct(
        private CourseService $CourseService
    ) {
    }

    public function list(LecturerCoursesRequest $request)
    {
        $lecturerID = $request->lecturerID ?? null;
        $coursesData = $this->CourseService->getCoursesData($lecturerID);
        if (count($coursesData)) {
            return response()->json(
                [
                'status' => 'success',
                'message' => null,
                'data' => $coursesData
                ],
                200
            );
        } else {
            return response()->json(
                [
                'status' => 'success',
                'message' => '無課程',
                'data' => $coursesData
                ],
                200
            );
        }
    }
}
