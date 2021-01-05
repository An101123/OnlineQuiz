<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Question_Test;
use Auth;

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
        // var_dump(Auth::check());exit;
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

        
        $test = DB::table('test')->get();
        $testSelect = DB::table('test_question')
        ->join('test', 'test.id', '=', 'test_question.test_id')->where('question_id','=', $id)->get();
        $question = DB::table('question')->select('question.*','test.*', 'test_question.*')->join('test_question','question.id','=','test_question.question_id')
        ->join('test', 'test_question.test_id', '=', 'test.id')
        ->where('question.id', '=', $id)->get();

        foreach($question as $item){
            $question->question_id = $item->question_id;
            $question->content = $item->content;
            $question->correct_answer = $item->correct_answer;
            $question->answer_1 = $item->answer_1;
            $question->answer_2 = $item->answer_2;
            $question->answer_3 = $item->answer_3;
            
            // var_dump($item->question_id);exit;
        }
        // var_dump($question);exit;
        return view('Admin.Question.edit', compact('test', 'question','testSelect'));


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
        DB::table('test_question')->where('test_question.question_id', '=', $id)->delete();
        // DB::table('question')->where('question.id','=',$id)->delete();

        // $question= new Question;
        // $question = Question::find($id);
        DB::table('question')->where('question.id', '=', $id)->get();
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