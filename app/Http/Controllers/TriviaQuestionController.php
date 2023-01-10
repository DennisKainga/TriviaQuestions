<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreTriviaRequest;
use App\Models\TriviaQuestion;


class TriviaQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        return TriviaQuestion::select('id','category','difficulty','question','correct_answer','incorrect_answers')->paginate(1);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTriviaRequest $request){
            
        $validated_data = $request->safe()->only(
            ['question','incorrect_answers','difficulty','correct_answer','category']
        );
            
        
        return TriviaQuestion::firstOrCreate([

            'question'=> $validated_data['question']],
            [
                'category'=> $validated_data['category'],
                'difficulty'=> $validated_data['difficulty'],
                'correct_answer'=>$validated_data['correct_answer'],
                'incorrect_answers'=> $validated_data['incorrect_answers']
            ]
        );

    
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Models\TriviaQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(TriviaQuestion $trivialquestion){
    
        return $trivialquestion;
        // return $trivialquestion;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\TriviaQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTriviaRequest $request,TriviaQuestion $trivialquestion){
        
        $validated_data =  $request->validated();
        

        $trivialquestion->update($validated_data);
        
        if($trivialquestion->wasChanged()){
            return response()->json([
                'message' => 'Record updated',
                'new_data'=>$trivialquestion,
                'old_data'=>$trivialquestion->getOriginal() 
            ], 200);
        }
        return response()->json([
            'message' => 'Record not updated',
            'data'=>$trivialquestion
        ], 200);
            
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\TriviaQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(TriviaQuestion $trivialquestion){
       $trivialquestion->delete();
       
        return response()->json([
            'message' => [
                'question'=>$trivialquestion->getOriginal('question'),
                'action'=>'Deleted']
        ], 200);

       
    }
    /**
     * Get random triviaQuestion
     *
     * @param  App\Models\TriviaQuestion
     * @return \Illuminate\Http\Response
     */
    public function random(){
        return TriviaQuestion::select('id','question','correct_answer','incorrect_answers')->get()->random(1);
        #inRandomOrder()->first();
    }
}
