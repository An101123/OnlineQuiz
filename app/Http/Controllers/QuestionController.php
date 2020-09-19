<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Question_Test;

use App\Flash;
use DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $question = DB::table('question')->get();
        // var_dump($question);exit;
        return view('Admin.Question.list', compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $test = DB::table('test')->get();
        return view('Admin.Question.create', compact('test'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $question = new Question;
        $question->content = $request->content;
        $question->answer_1 = $request->answer_1;
        $question->answer_2 = $request->answer_2;
        $question->answer_3 = $request->answer_3;
        $question->correct_answer = $request->correct_answer;
        $question->save();

        $result = $question;
        $last_id_insert = $result->id;

foreach(($request->list_test) as $value) {
        $quest_test = new Question_Test;
        $quest_test->question_id = $last_id_insert;
        $quest_test->test_id  = $value;//(1,2,3,4)
        $quest_test->save();
        }
        // var_dump($question);exit;
        return redirect(route('question.index'))->with('notification', 'Question saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $question = DB::table('question')->where('id','=',$id)->first();
        // Var_dump($question);exit;

        $question = Question::find($id);

        return view('Admin.Question.edit', compact('question'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $question = DB::table('question')->where('id','=',$id)->first();
        $question= Question::find($id);
        $question->content = $request->content;
        $question->answer_1 = $request->answer_1;
        $question->answer_2 = $request->answer_2;
        $question->answer_3 = $request->answer_3;
        $question->correct_answer = $request->correct_answer;
        $question->save();
        // var_dump($question);exit;
        return redirect(route('question.index'))->with('notification', 'Question updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        // echo "123123";exit;
        $question = Question::find($id);
        $question->delete($id);
        
        return redirect(route('question.index'))->with('notification','Question deleted successfully.');
    }
}