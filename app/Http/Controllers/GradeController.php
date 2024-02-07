<?php

namespace App\Http\Controllers;

use App\ValueObjects\GradeValueObject;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;

final class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $grades = (array) Config::get('grades.grades');

        abort_if(empty($grades), 404, 'Empty grades list');

        $gradesCollection = [];

        foreach ($grades as $grade) {
            $grade = is_array($grade) ? $grade : (array) $grade;

            $gradesCollection[] = new GradeValueObject(
                title: $grade['title'],
                description: $grade['description'],
                accessCondition: $grade['access_condition'],
                advantages: $grade['advantages']
            );
        }

        return response()->json($gradesCollection);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $gradeName): JsonResponse
    {
        $grade = Config::get("grades.grades.$gradeName");

        abort_if(! $grade, 404, 'Grade not found');

        $grade = is_array($grade) ? $grade : (array) $grade;

        $grade = new GradeValueObject(
            title: $grade['title'],
            description: $grade['description'],
            accessCondition: $grade['access_condition'],
            advantages: $grade['advantages']
        );

        return response()->json($grade);
    }
}
