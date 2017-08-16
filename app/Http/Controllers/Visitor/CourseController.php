<?php

namespace App\Http\Controllers\Visitor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CoursesRepository;

class CourseController extends Controller
{
    public function index()
    {
        $courseRepo = new CoursesRepository;
        return response()->json(['success' => true, 'objects' => $courseRepo->getCourses(), 'scheduler' => $courseRepo->getSchedulerCourses()]);
    }
}
