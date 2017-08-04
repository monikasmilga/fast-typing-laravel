<?php namespace App\Http\Controllers;

use App\Models\FTScore;
use Illuminate\Routing\Controller;
use Ramsey\Uuid\Uuid;

class FTScoreController extends Controller
{

    /**
     * Display a listing of the resource.
     * GET /ftscore
     *
     * @return Response
     */
    public function index()
    {
        $config['level3list'] = FTScore::where('level', '3')->orderBy('score', 'desc')->get()->toArray();
        $config['level6list'] = FTScore::where('level', '6')->orderBy('score', 'desc')->get()->toArray();
        $config['level9list'] = FTScore::where('level', '9')->orderBy('score', 'desc')->get()->toArray();

        return view('highscores', $config);
    }

    /**
     * Show the form for creating a new resource.
     * GET /ftscore/create
     *
     * @return Response
     */
    public function create()
    {
        return view('game');
    }

    /**
     * Store a newly created resource in storage.
     * POST /ftscore
     *
     * @return Response
     */
    public function store()
    {
        $data = request()->all();
        FTScore::create([
            'id' => Uuid::uuid4(),
            'name' => $data['name'],
            'level' => $data['level'],
            'score' => $data['score'],
            'duration' => $data['duration'],
            'speed' => $data['speed'],
        ]);
        dd($data);

        return view('game');
    }

    /**
     * Display the specified resource.
     * GET /ftscore/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /ftscore/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /ftscore/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /ftscore/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}