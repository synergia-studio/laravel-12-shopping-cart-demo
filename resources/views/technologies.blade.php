@extends('layouts.app-front')

@section('content')
 <div class="container-fluid py-3">          
      <h1 class="display-5 fw-bold">{{ $main_section_title }}</h1>

  <p>
    The following frameworks and libraries are used to build this demo site:
    <br />
    <ul>
      <li>
        <a class="nav-link" href="https://nodejs.org/en" target="_blank">Laravel - version 12.x - PHP framework with a robust ecosystem</a> 
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://expressjs.com" target="_blank">Alpine.js - version 3.15.3 -  is a lightweight JavaScript framework</a> 
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://en.wikipedia.org/wiki/HTML5" target="_blank"">Html 5 - Wikipedia</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://getbootstrap.com" target="_blank">Bootstrap - version 4.0.0 - Powerful, extensible, and feature-packed frontend toolkit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://en.wikipedia.org/wiki/CSS" target="_blank">Custom CSS - Wikipedia</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="https://jquery.com" target="_blank">jQuery - version 3.7.1 - fast, small, and feature-rich JavaScript library</a>
      </li>
    </ul>
    <br />
  </p>

  @endsection
 