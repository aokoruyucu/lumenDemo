<?php

namespace App\Http\Controllers;


use App\Program;
use App\ProgramFilters;
use App\Transformers\ProgramTransformer;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class ProgramController extends Controller
{
    //

    use Helpers;

    protected $ProgramTransformer ;
    /**
     * @var Request
     */

    /**
     * @return Dispatcher
     */
    public function __construct()
    {
        $this->middleware('oauth');
    }

    public function getProgram($id){

        $ProgramTransformer = new ProgramTransformer();
        return response(
            $ProgramTransformer->transform(Program::findOrFail($id))
        );
    }

    public function getAllProgramDetail(){

       
        $program =  Program::all();
        $ProgramTransformer = new ProgramTransformer();
        $ProgramTransformer->setFlag("both");

        return $this->response->collection($program, $ProgramTransformer);
    }

    public function getProgramWithSpeakers($id){
        $ProgramTransformer = new ProgramTransformer();
        $program =$ProgramTransformer->transform(Program::findOrFail($id));
        $speakers =  Program::find($id)->speaker()->get();
        return array_add($program,"speakers",$speakers);

    }

    public function filter(ProgramFilters $filters){

       $ProgramTransformer = new ProgramTransformer("tag");
       $program = Program::filter($filters)->get();
        return $this->response->collection($program, $ProgramTransformer);

    }

    public function eager(){
        $program = Program::with(['speaker' => function ($query) {
            //$query->where('program_id', '=', $id);
        }])->get();
        $ProgramTransformer = new ProgramTransformer("speaker");
        return $this->response->collection($program, $ProgramTransformer);
    }

    public function orm($id){

        $program = Program::find($id)->withPivot;

        return $program;
    }
}
