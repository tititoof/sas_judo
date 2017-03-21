<?php

namespace App\Repositories;

use App\Models\Course;
use App\Models\Season;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class CoursesRepository
{
  public function save(Request $request)
  {
    return $this->update($request, new Course);
  }

  public function update(Request $request, Course $course)
  {
    try {
      $startAt            = $this->setDateTime(new \DateTime('now'), $request->input('start_at'));
      $endAt              = $this->setDateTime(new \DateTime('now'), $request->input('end_at'));
      $course->name       = $request->input('name');
      $course->day        = $request->input('day');
      $course->start_at   = $startAt->format('H:i');
      $course->end_at     = $endAt->format('H:i');
      $course->teacher_id = $request->input('teacher_id');
      $course->season_id  = $request->input('season_id');
      $course->save();
    } catch (\Exception $exception) {
      return ['success' => false, 'errors' => $exception->getMessage()];
    }
    return ['success' => true, 'errors' => '', 'course' => $course];
  }

  /**
   * @param \DateTime $inDate
   * @param array $inTime
   * @return \DateTime
   */
  private function setDateTime(\DateTime $inDate, Array $inTime)
  {
      $inDate->setTime($inTime['HH'], $inTime['mm']);
      return $inDate;
  }

  public function getFormOptions()
  {
    $userRepo = new UserRepository;
    $teachers = $userRepo->getAllTeachers();
    $seasons  = Season::orderBy('id', 'desc')->get();
    $seasons  = $seasons->map(function($season, $key) {
      return ['label' => $season->name, 'value' => $season->id];
    });
    return ['success' => true, 'objects' => [
      'seasons'   => $seasons,
      'teachers'  => $teachers['objects'],
      'days'      => $this->getDays(),
    ]];
  }

  public function getCourses()
  {
    $courses = Course::all();
    $courses = $courses->map(function($course, $key) {
      return [
        'id'        => $course->id,
        'season'    => $course->season->name,
        'day'       => $course->day,
        'start_at'  => $course->start_at,
        'end_at'    => $course->end_at,
        'teacher'   => $course->teacher->name,
      ];
    });
    return $courses;
  }

  private function getDays()
  {
    $days = collect(['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche']);
    $days = $days->map(function($day, $key) {
      return ['label' => $day, 'value' => $day];
    });
    return $days;
  }

}
