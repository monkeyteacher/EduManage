<?php

namespace App\Http\Controllers;

use App\Services\CourseService;
use App\Http\Requests\LecturerCoursesRequest;
use App\Http\Requests\CourseRequest;

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

    public function create(CourseRequest $request)
    {
        $courseData = array(
            'courseName' => $request->input('courseName'),
            'introduction' => $request->input('introduction'),
            'courseTime' => $request->input('courseTime'),
            'lecturerID' => $request->input('lecturerID')
        );
        $courseData = $this->CourseService->storeCoursesData($courseData);
        return response()->json(
            [
                'status' => 'success',
                'message' => null,
                'data' => $courseData
            ],
            200
        );
    }

    public function update(CourseRequest $request, $courseID)
    {
        $courseData = array(
            'courseName' => $request->input('courseName'),
            'introduction' => $request->input('introduction'),
            'courseTime' => $request->input('courseTime'),
            'lecturerID' => $request->input('lecturerID')
        );
        $result = $this->CourseService->updateCoursesData($courseData, $courseID);
        if ($result['status'] == 'success') {
            return response()->json(
                [
                    'status' => 'success',
                    'message' => null,
                    'data' => $result['data']
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => $result['message'],
                    'data' => null
                ],
                400
            );
        }
    }

    public function delete($courseID)
    {
        $result = $this->CourseService->deleteCourseData($courseID);
        if ($result['status'] == 'success') {
            return response()->json(
                [
                    'status' => 'success',
                    'message' => null,
                    'data' => null,
                ],
                200
            );
        } else {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => $result['message'],
                    'data' => null
                ],
                400
            );
        }
    }
}
