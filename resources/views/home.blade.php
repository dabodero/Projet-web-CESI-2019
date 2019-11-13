@extends('layouts.app')

@section('content')
<form>
    <br>
    <br>
    <div class="container mh-30 col-10">
            <!-- Carousel -->
            <div id="demo" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('assets/img/img_1.png')}}" alt="Los Angeles" >
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/img/img_3.png')}}" alt="Chicago">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/img/img_2.png')}}" alt="New York">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="title-container-home"><p> Les événements</p></div>
            <div class="d-flex flex-row-reverse">
                    <div class="p-2"> </div>
            <button class="btn btn-primary text-white " href={{ url('events') }} p-2>Voir les autres événements ►</button>
            
        </div>
    </div>
        
        <div class="form-group">
            <div class="title-container-home"><p>Les coups de coeur du moment</p></div>
            <div class=""> 
                {{-- Insérer ici le code --}}
            </div>
            <div class="d-flex flex-row-reverse">
                    <div class="p-2"> </div>
            <button class="btn btn-primary text-white " href={{ url('events') }} p-2>Voir toute la boutique ►</button>
            
        </div>
    </div>
        </div>
</form>
    <br>
@endsection 