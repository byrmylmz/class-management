<?php

namespace App\Http\Controllers;

use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lesson.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lesson.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       
        Lesson::create($request->all());

        return redirect('lesson');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {   
        return view('lesson.edit',compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $lesson->update($request->all());
        return response('lesson');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for assign lesson to classroom.
     *
     * @return \Illuminate\Http\Response
     */
    public function assign()
    {
        return view('lesson.assign');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function assignStore(Lesson $lesson)
    {
        //
    }


    public function source()
    {   
        $test=[
            [
            "title"=> "Event 1",
            "start"=> "2022-06-05T09:10:00",
            "end"=> "2022-06-05T10:20:00"
            ],
            [
            "title"=> "Event 1",
            "start"=> "2022-06-06T09:00:00",
            "end"=> "2022-06-06T18:00:00"
            ],
            [
            "title"=> "Event 1",
            "start"=> "2022-06-07T09:00:00",
            "end"=> "2022-06-07T18:00:00"
            ],
        ];
        // return new LessonResource($test);
        return response()->json($test);
    }
}
