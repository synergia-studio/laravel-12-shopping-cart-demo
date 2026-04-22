@extends('layouts.app-front')

@section('content')
  <div class="container-fluid py-3">
    <h1 class="display-5 fw-bold">{{ $main_section_title }}</h1>


    <a href="{{ asset('documents') }}/Sasa_Rakic_All_Languages_Resume.pdf">Sasa_Rakic_All_Languages_Resume.pdf</a>
    /
    <a href="{{ asset('documents') }}/Sasa_Rakic_All_Languages_Resume.docx">Sasa_Rakic_All_Languages_Resume.docx</a>

 @endsection
