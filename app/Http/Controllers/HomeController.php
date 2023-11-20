<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEleveRequest;
use App\Models\Course;
use App\Models\Eleve;
use App\Models\Movie;
use App\Models\User;
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

        return Redirect::route('formations')->with('message', 'Formation créée !');
    }



    public function courseUpdate(Course $course, Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:99',
            'description' => 'required|string'
        ]);

        $course->title = $request -> title;
        $course->description = $request -> description;
        $course->save();

        //return Redirect::route('formations')->with('message', 'Formation mise à jour !');
        return Redirect::back();
    }


    public function courseSupprimer(Course $course){
        $course->delete();

        return Redirect::route('formations')
            ->with('success', 'Formation supprimée avec succès');
    }

    public function users(): Response {
        $users =  User::query()
        ->when(request()->input('search'),function($query, $search){
            $query->where('name', 'like', "%{$search}%");
        })
        ->when(request()->has('column'), function($query){
            $query->orderBy(request()->input('column'), request()->input('direction'));
        })
        ->paginate(10)
        ->appends(request()->all());
        return Inertia::render ('Classes/ClassesIndex', ['users' => $users, 'filters' => request()->only(['search', 'column', 'direction'])]);
    }

    public function userEdit($id): Response {
        $user = User::find($id);
        return Inertia::render('Classes/UserIndex',[
            'selectedUser' => $user
        ]);
    }

    public function eleves(EleveController $eleveController): Response {
        $eleves = $eleveController->index();
        return Inertia::render('Eleves/ElevesIndex', [
            'eleves' => $eleves,
            'filters' => request()->only(['search', 'column', 'direction'])
        ]);
    }
    
    public function eleveNouveau(): Response {
        return Inertia::render('Eleves/EleveForm');
    }

    public function eleveStore(StoreEleveRequest $request) {
        $store = new EleveController;
        $store->store($request);
        return Redirect::route('eleves');
    }

    public function eleveEdit($id): Response {
        $show = new EleveController;
        $eleve = $show->show($id);
        return Inertia::render('Eleves/EleveIndex', [
            'eleve' => $eleve
        ]);
    }
}
