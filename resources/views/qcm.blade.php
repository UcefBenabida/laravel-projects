@extends('layouts.formulaire')

@section('title')
    QCM
@endsection
@section('style-links')
    <link  href="/../css/question.css" rel="stylesheet" />
@endsection
@section('style')
    <style>
        
    </style>
@endsection

@section('content')
    @csrf


        @if(!empty($questions) && !empty($answers))
            @foreach ($questions as $index => $question)
                @if($index == 0)
                    <div  class="first-div"  > {{ $question->lib_question }} </div>
                @else
                    <div> {{ $question->lib_question }} </div>
                @endif

                @foreach ($answers[$index] as $answer)
                    @if (strtolower($answer->lib_answer) == "vrai" || strtolower($answer->lib_answer) == "faux")
                        <input 
                            
                        type="radio" name="id_question{{ $answer->id_question }}" value="{{ $answer->id_answer }}" /><label>{{  $answer->lib_answer  }}</label><br>
                    @else
                        <input
                            
                        name="id_answer{{ $answer->id_answer }}" type="checkbox" value="{{ $answer->id_answer }}" /> <label>{{  $answer->lib_answer  }}</label><br>
                    @endif
                @endforeach
            @endforeach
            <a id="return" href="{{ url('formulaire') }}">retourner</a>

            <input id="submit" name="submit" type="submit" value="valider">
        @else
            <h3>Pas de QCM disponible maintenant</h3>
        @endif

   
@endsection