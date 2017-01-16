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

/**
 * @Resource("ProgramController")
 */
class ProgramController extends Controller
{
    //

    use Helpers;

    protected $ProgramTransformer ;

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

    /**
     * getProgramWithSpeakers
     *
     * @Get("/program/{id}/speakers")
     * @Parameters({
     *      @Parameter("id", type="int", required=true, description="id of program")
     *
     * })
     * */
    public function getProgramWithSpeakers($id){
        $ProgramTransformer = new ProgramTransformer("speaker");
        $program =$ProgramTransformer->transform(Program::findOrFail($id));
        $speakers =  Program::find($id)->speaker()->get();
        return array_add($program,"speakers",$speakers);


    }
    /**
     * Filter Function
     *
     * @Post("/filter")
     * @Parameters({
     *      @Parameter("sort", type="string", required=false, description="filter option"),
     *      @Parameter("title", type="string", required=false, description="ilter option"),
     *      @Parameter("access_token", type="string", required=true, description="Auth token")
     * })
     * */
    public function filter(ProgramFilters $filters){

       $ProgramTransformer = new ProgramTransformer("tag");
       $program = Program::filter($filters)->get();
        return $this->response->collection($program, $ProgramTransformer);

    }


    /**
     * Eager Loading Example with all relations using transformers
     *
     * @Post("/eager")
     * @Parameters({
     *      @Parameter("access_token", type="string", required=true, description="Auth token")
     * })
     * *@Transaction({
     *      @Request({ "access_token": "bar"}),
     *
     * })
     * */
    public function eager(){

        $program = Program::with('speaker','tag')->get();
        $ProgramTransformer = new ProgramTransformer('both');
        return $this->response->collection($program, $ProgramTransformer);
    }

    /**
     * Return Program with id
     *
     *
     *
     * @Post("/orm")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", type="integer", required=true, description="Id of program"),
     *      @Parameter("access_token", type="string", required=true, description="Auth token")
     * })
     *@Transaction({
     *      @Request({"id": "foo", "access_token": "bar"}),
     *      @Response(200, body={
                                "program": {
                                "id": 1,
                                "title": "Gala",
                                "subtitle": "subtitle",
                                "description": "Lorem ipsum asdasd",
                                "start": "18:00",
                                "end": "19:00",
                                "url": "",
                                "date": "2017-01-08"
                                }
                                }),
     *      @Response(422, body={"error": {"id": {"id field is required."}}}),
     *      @Response(500, body={
                            "error": {
                            "message": "500 Internal Server Error",
                            "status_code": 500
                            }
                            })
     * })
     */

    public function orm(Request $request){
        $rules = [
            'id' => ['required','numeric']
        ];

        $payload = $request->all();
        $validator = app('validator')->make($payload, $rules);
        if ($validator->fails()) {
            throw new StoreResourceFailedException($validator->errors());
        }

        $id=$request["id"];
        $program = Program::find($id);
        if($program){
            return response($program,200);
        }else{
            throw new NotFoundResourceException();
        }
    }
}
