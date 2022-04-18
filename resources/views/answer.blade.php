@extends('layouts.formulaire')

@section('title')
    Réponses 
@endsection

@section('style-links')
    <link rel="stylesheet" href="/../materialize/css/materialize.css" />
@endsection

@section('style')
    <style>

        .used-section{
            background-color: rgb(184, 244, 247);
            box-shadow: -1px 0.5px 2px black;
            padding: 30px;
        }

        body{
            background-color: rgb(241, 240, 224);
        }

        .card-description{
            overflow-y: scroll;
        }

        .card{
            background-color: rgb(184, 244, 247);
        }

        #return{
            margin-left: 15px; 
            font-size: 23px;
            color: rgb(65, 62, 62);
            border-radius: 6px 6px 6px 6px;
            box-shadow: -1px 0.5px 2px black;
            padding: 5px;
            background-color: rgb(230, 179, 179);

        }

        #return-home{
            margin-right: 15px; 
            font-size: 23px;
            color: rgb(65, 62, 62);
            border-radius: 6px 6px 6px 6px;
            box-shadow: -1px 0.5px 2px black;
            padding: 5px;
            background-color: rgb(230, 179, 179);

        }

        .text{
            font-size: 24px;
            margin-right: 40px;
        }

    </style>
@endsection

@section('content')

    <div class="section used-section center-align">
        <b class="text">
            Votre résultat
        </b>
        <a id="return-home" href="{{ url('qcm/' . $id_form) }}">Page précédente</a>
        <a id="return" href="{{ url('formulaire') }}">Accueil</a>
    </div>
    <div class="section"></div>



    <div class="container">

        <?php $var = 0; ?>


    @if (isset($result['questions']))

        <div class="row" >

            @foreach ($result['questions'] as $index => $question )

                <?php $var += 1; ?>

                @if ($var > 4)
                    </div>
                    <div class="row" >
                    <?php $var = 1; ?>
                @endif

                <div class="col s12 m6 l4 xl3">


                    <div class="card small hoverable" >
                    
                        <div class="card-content smaller">
                        <span class="card-title"><b>la question:</b> {{ $question->lib_question }}</span>
                        <span class="card-description">

                            @foreach ($result['answers'][$index] as $j => $answer)
                                @if (isset($is_correct[$j]))
                                    <div><b>votre réponse: </b> {{ $answer->lib_answer }}</div>
                                    <b>elle est: </b>
                                    @if ($is_correct[$j])
                                        <b style="color: greenyellow">Vrai</b>
                                    @else
                                        <b style="color: red">Fausse</b>
                                    @endif
                                @endif
                            @endforeach
                            @if (isset($corrections[$index]))
                                <br><b style="color:cornflowerblue" >la réponse: </b>{{ $result['answers'][$index][$corrections[$index]]->lib_answer }}
                            @endif

                        </span>
                        </div>

                    </div>


                </div>


            @endforeach

            

        </div>


    @endif

    @section('script')
        <script src="/../materialize/js/materialize.js" ></script>
    @endsection

@endsection