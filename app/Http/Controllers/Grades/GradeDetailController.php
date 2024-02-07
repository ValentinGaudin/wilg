<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\ValueObjects\GradeValueObject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

final class GradeDetailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $gradeName): JsonResponse
    {
        $gradesConfig = (array) Config::get('grades.grades');

        abort_if(! isset($gradesConfig[$gradeName]), 404, 'Grade not found');

        $gradeConfig = is_array($gradesConfig[$gradeName]) ? $gradesConfig[$gradeName] : (array) $gradesConfig[$gradeName];

        $grade = new GradeValueObject(
            description: $gradeConfig['description'],
            accessCondition: $gradeConfig['access_condition'],
            advantages: $gradeConfig['advantages']
        );

        return response()->json($grade);
    }
}