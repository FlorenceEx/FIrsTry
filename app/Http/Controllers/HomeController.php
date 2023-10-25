<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Movie;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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

    public function movieTable() : Response {
        $movies = Movie::all();
        return Inertia::render('MovieTable', ['movies' => $movies]);
    }

    public function courses(): Response {
        // $courses = Course::all();
        $courses = Course::with('user')->withCount('episodes')->get();
        return Inertia::render('Courses/Index/CoursesIndex', [
            'courses' => $courses
        ]);
    }

    public function course($id): Response {
        $course = Course::find($id);
        return Inertia::render('Courses/Index/CoursesIndex', [
            'selectedCourse' => $course,
        ]);
    }

    public function courseCreate(): Response {
        return Inertia::render('Courses/Create/CourseCreate');
    }

    public function courseStore(Request $request) {
        // Valider les paramètres envoyés
        $validated = $request->validate([
            'title' => 'required|string|max:99',
            'description' => 'required|string'
        ]);

        // Enregistrer
        //$userId = Auth::id(); une première méthode 
        $userId = $request->user()->id;
        $newCourse = new Course();
        $newCourse->title = $request->title;
        $newCourse->description = $request->description;
        $newCourse->user_id = $userId;
        $newCourse->save();

        return Redirect::back()->with('message', 'Formation créée !');
    }

    // passer l'ID de la formation à la fonction
    // elle fera une in jection de dépendance qui ne retournera que la formation demandée
    public function courseEdit(Course $course) {
        return Inertia::render('Courses/Edit/CourseEdit', [
            'course' => $course
        ]);
    }
}
