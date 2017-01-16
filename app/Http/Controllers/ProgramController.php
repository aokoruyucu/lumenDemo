<?php

namespace App\Http\Controllers;


use App\Program;

use App\ProgramFilters;
use App\Transformers\ProgramTransformer;
use Dingo\Api\Exception\StoreResourceFailedException;
use Dingo\Api\Exception\ValidationHttpException;
use Dingo\Api\Http\Response;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use Symfony\Component\Translation\Exception\NotFoundResourceException;


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

    public function orm(Request $request){
        $rules = [
            'id' => ['required','numeric']
        ];

        $payload = app('request')->only('id', 'title');

        $validator = app('validator')->make($payload, $rules);

        if ($validator->fails()) {
            throw new StoreResourceFailedException($validator->errors());
        }

        $id=$request["id"];
        $program = Program::find($id);
        if($program){
            return $program;
        }else{
            throw new NotFoundResourceException();
        }
    }
}
