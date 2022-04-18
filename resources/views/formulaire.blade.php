@extends('layouts.formulaire')

@section('title')
    QCM | LISTE
@endsection

@section('style-links')
    <link  href="/../css/formulaire.css" rel="stylesheet" />
@endsection

@section('style')
    <style>
        
    </style>
@endsection

@section('content')
    @if (!empty($forms))
        @foreach ($forms as $form)
            <a href="{{url("qcm/{$form['id']}")}}" >{{ $form['lib_formulaire'] }}</a>
        @endforeach
    @else
        <h3>Pas de QCM disponible maintenant</h3>
    @endif
@endsection