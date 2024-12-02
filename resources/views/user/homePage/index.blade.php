@extends('user.source.template')
@section('content')
<main>
    
@include('user.homePage.sections.hero')
@include('user.homePage.sections.categories')
@include('user.homePage.sections.about')
@include('user.homePage.sections.job')
@include('user.homePage.sections.our-mission')
@include('user.homePage.sections.recent-jobs')
@include('user.homePage.sections.reviews')
@include('user.homePage.sections.cta')
   
</main>
@endsection