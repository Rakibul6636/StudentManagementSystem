@extends('layouts.app')

@section('content')
<div class="container">
    <!-- begin:home-slider -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                aria-label="Slide 5"></button>


        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/image/slide1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Birds Eye View</h5>
                    <p>Skey View of BRUR.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/image/slide2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Red Buses</h5>
                    <p>Red Buses of BRUR.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/image/slide3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Academic Building</h5>
                    <p>Academic Building of BRUR.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/image/slide4.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>BRUR Banner</h5>
                    <p>Name Banner of BRUR.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/image/slide5.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Academic Building</h5>
                    <p>Academic Building of BRUR.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- end:home-slider -->
    
</div>
<style type="text/css">
.president {
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
@endsection