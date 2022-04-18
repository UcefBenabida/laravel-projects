<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Formulaire;



class SmartController extends Controller
{
    

    public function getFormulaires()
    {
        $forms = Formulaire::all();
        return view('formulaire')->with('forms', $forms);
    }

    public function getQcms($id_form)
    { 
        return view('qcm')->with($this->returnQcms($id_form)) ;
    }

    public function getReponse($id_form)
    {

        $is_correct = [];
        $corrections = [];
        $instant_answer = "";
        $result = $this->returnQcms($id_form) ;
        $user_have_answer = false;
        foreach($result['questions'] as $indque => $question)
        {
            $user_have_answer = false;
            foreach($result['answers'][$indque] as $index => $answer)
            {
                if($answer->correct == 1)
                {
                    $instant_answer = $index;
                }

                if(isset($_POST['id_answer' . $answer->id_answer]) || (isset($_POST['id_question' . $answer->id_question]) && $_POST['id_question' . $answer->id_question] == $answer->id_answer))
                {
                    if($answer->correct == 1)
                    {
                        $is_correct[$index] = true;
                        $user_have_answer = true;
                    }
                    else
                    {
                        $is_correct[$index] = false;
                    }
                }
            }
            if(!$user_have_answer)
            {
                $corrections[$indque] = $instant_answer ;
            }
        }   
        

        return view('answer')->with(['result' => $result, 'is_correct' => $is_correct, 'corrections' => $corrections, 'id_form' => $id_form]) ;
        
    }




    public function returnQcms($id_form)
    {
        $answers = [];
        $index = 0;
        $questions = DB::table('questions')->select('*')->where('id_formulaire','=',$id_form)->get();
        foreach($questions as $index => $question)
        {
            $answers[$index] = DB::table('answers')->select('*')->where('id_question', '=', $question->id_question)->get();
        }
        return ['questions' => $questions,
        'answers' => $answers];
    }
}
