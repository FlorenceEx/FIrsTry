<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{    
    /**
     * index
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Dashboard');
    }
    
    /**
     * florence
     *
     * @return Response
     */
    public function florence(): Response {
        $welcomeMessage = "Ceci est un message de bienvenue";
        return Inertia::render('Florence', ['msg' => $welcomeMessage]);
    }

    public function courses(): Response {
        $courses = Course::all();
        return Inertia::render('Courses/CoursesIndex', [
            'courses' => $courses
        ]);
    }
}
