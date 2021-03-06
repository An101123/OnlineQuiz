<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use  App\Models\Test;
use App\Models\Type;
use App\Models\Question;
use App\Models\Question_Test;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $test = DB::table('test')->get();
        // $test = Test::all();
        $type = DB::table('test_type')
        ->select('test_type.id', 'test_type.name')
        ->join('test', 'test.test_type_id', '=', 'test_type.id')->get();

        $test = DB::table('test')
        ->select('test.*', 'test_type.name')
        ->join('test_type', 'test.test_type_id', '=', 'test_type.id')->get();
        
        // echo "<pre>";
        // var_dump($test);exit;
        return view('Admin.Test.list', compact('test','type'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $type = DB::table('test_type')->get();
        $question = Question::all();
        // var_dump($test_type_id);exit;
        return view('Admin.Test.create', compact('type', 'question'));

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
        $test = new Test;
        // var_dump($test);exit;
        $test->test_name = $request->test_name;
        $test->test_time = $request->test_time;
        $test->active = $request->active;
        $test->description = $request->description;
        $test->password = $request->password;
        $test->question_number = $request->question_number;
        $test->test_type_id = $request->test_type_id;

        $test->save();
        $result = $test;
        $last_id_insert = $result->id;

        // var_dump($result);exit;
        
        foreach(($request->list_question) as $value) {
        $quest_test = new Question_Test;
        $quest_test->test_id = $last_id_insert;
        $quest_test->question_id  = $value;//(1,2,3,4)
        $quest_test->save();
        }
        
        return redirect(route('test.index'))->with('notification', 'Test created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $test = DB::table('test_question')->join('question', 'test_question.question_id', '=', 'question.id')->where('test_id', '=', $id)->get();
        // var_dump($test);exit;
        return view('Admin.Test.detail', compact('test'));
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
        $type = DB::table('test_type')->get();
        $typeSelect = DB::table('test')->select('test_type_id')->where('test.id', '=', $id)->get();

        $question = DB::table('question')->get();
        $questionSelect = DB::table('test_question')->join('question', 'test_question.question_id', '=', 'question.id')->where('test_id', '=', $id)->get();
        // $test = DB::table('test')->where('test.id', '=', $id)->get();
        $test = DB::table('test')->select('question.*','test.*', 'test_question.*')->join('test_question','test.id','=','test_question.test_id')
        ->join('question', 'test_question.question_id', '=', 'question.id')
        ->where('test.id', '=', $id)->get();
    //   var_dump($typeSelect);exit;

        foreach($test as $item){
            $test->test_id = $item->test_id;
            $test->test_name = $item->test_name;
            $test->test_type_id = $item->test_type_id;
            $test->password = $item->password;
            $test->description = $item->description;
            $test->question_number = $item->question_number;
            $test->test_time = $item->test_time;
            
            // var_dump($item->question_id);exit;
        }

       
        
        return view('Admin.Test.edit', compact('test','type','question', 'questionSelect', 'typeSelect'));
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
        DB::table('test_question')
        ->where('test_question.test_id', '=', $id)->delete();
        DB::table('test') ->where('test.id', '=', $id)->delete();
        $test = new Test;
        $test->test_name = $request->test_name;
        $test->test_time = $request->test_time;
        $test->active = $request->active;
        $test->description = $request->description;
        $test->password = $request->password;
        $test->question_number = $request->question_number;
        $test->test_type_id = $request->test_type_id;
        $test->save();
        
        $result = $test;
        $last_id_insert = $result->id;
        
        foreach(($request->list_question) as $value) {
        $quest_test = new Question_Test;
        $quest_test->test_id = $last_id_insert;
        $quest_test->question_id  = $value;//(1,2,3,4)
        $quest_test->save();
        }

        return redirect(route('test.index'))->with('notification', 'Test updated successfully');
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
        DB::table('test_question')
        ->where('test_question.test_id', '=', $id)->delete();
        DB::table('test') ->where('test.id', '=', $id)->delete();
        
        return redirect(route('test.index'))->with('notification','Test deleted successfully.');
    }
}