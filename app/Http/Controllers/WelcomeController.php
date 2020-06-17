<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Jhormantasayco\Drozen\Facade\Greeting;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){

        //
    }

    /**
     * Show the application index.
     *
     * @return Response
     */
    public function index(){

        $params = Usuario::searchzyInputs();

    	$oUsuarios = Usuario::withCount(['posts AS posts_count'])
                        ->with(['posts'])
                        ->searchzy()
                        ->orderBy('name')
                        ->paginate();

    	return view('welcome.index', compact('params', 'oUsuarios'));
   	}

}
