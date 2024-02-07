<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\ValueObjects\GradeValueObject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

final class GradeIndexController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $grades = (array) Config::get('grades.grades');

        abort_if(empty($grades), 404, 'Empty grades list');

        $gradesCollection = [];

        foreach ($grades as $grade) {
            $grade = is_array($grade) ? $grade : (array) $grade;

            $gradesCollection[] = new GradeValueObject(
                description: $grade['description'],
                accessCondition: $grade['access_condition'],
                advantages: $grade['advantages']
            );
        }

        return response()->json($gradesCollection);
    }
}
