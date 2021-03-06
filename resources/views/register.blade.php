@extends('layouts.app')
@section('title',"Enregistrement")
@section('meta-description',"Page pour s'enregistrer avant de procéder à la connexion, pour tous les nouveaux utilisateurs.")
@section('content')
<div class="bg3">
<div class="container">
  <div class="row">
    <div class="col-md-2 col-sm-12 col-xs-12"></div>
    <div class="col-md-8 col-sm-12 col-xs-12">    
      {{-- title --}}      
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="title-container rounded">
            <h1>Inscription</h1>
          </div>
      </div>
        {{-- form start --}}  
        {{-- Name --}}      
      <form class="form-container rounded" action="/register" method="POST">
        @csrf
        <div class="parts">
            <a href="{{action('UsersController@showlogin')}}"> Déjà inscrit ?</a>
        </div>
        <br>
          <div class="form-row">
            <div class="name-container">
              <div class="col-md-10 col-sm-12 col-xs-12">
                <label for="inputName">Nom</label>

                {{-- The lign below is going to add the is-invalid class if there's an error --}}
                <input type="text" class="form-control @error('inputName') is-invalid @enderror" id="inputName" placeholder="Nom" name="inputName">
              </div>
            </div>

            {{-- The display message in case of not putting a name --}}
            @error('inputName')
            <div class="invalid-feedback">
                Please enter a name.
            </div>
            @enderror

            {{-- Firstname --}}            
            <div class="name-container">
              <div class="col-md-10 col-sm-12 col-xs-12">
                <label for="inputFirstname">Prénom</label>
                <input type="text" class="form-control @error('inputFirstname') is-invalid @enderror" id="inputFirstname" placeholder="Prénom" name="inputFirstname">
              </div>
            </div>
          </div>

          {{-- Zone --}}          
          <div class="form-group">
            <div class="col-md-6 col-sm-8 col-xs-12">
              <label for="inputCenter">Centre</label>
              <select id="inputCenter" class="form-control" name="inputCenter">
                @foreach($campuss as $campus)                                            
                  <option value="{{$campus->id}}">
                    {{$campus->name}}
                  </option>
                @endforeach              
              </select>
            </div>
          </div>
          {{-- Mail --}}          
          <div class="form-group">
            <div class="col-md-7 col-sm-9 col-xs-12">
              <label for="inputEmail">Mail</label>
              <input type="email" class="form-control @error('inputEmail') is-invalid @enderror" id="inputEmail" placeholder="exemple@mail.com" name="inputEmail">
            </div>
          </div>
          {{-- password --}}          
          <div class="form-group">
            <div class="col-md-7 col-sm-9 col-xs-12">
              <label for="inputPassword">Mot de passe</label>
              <input type="password" class="form-control @error('inputPassword') is-invalid @enderror" id="inputPassword" placeholder="Mot de passe" name="inputPassword">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-7 col-sm-9 col-xs-12">
              <label for="inputState">Confirmation du mot de passe</label>
              <input type="password" id="confirmpassword" class="form-control @error('inputConfirmPassword') is-invalid @enderror" placeholder="Confirmation du mot de passe" name="inputConfirmPassword">
            </div>
          </div>
          <br>

          {{-- Checkbox to accept legalmentions --}}
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="checkbox" name="inputCheckbox">
              <label class="form-check-label" for="gridCheck">                J'accepte les <a href="legal">mentions légales et les conditions d'utilisiation.       </a>       </label>
            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-primary btn-block text-white">S'inscrire</button>
        </form>
        {{-- form end --}}      
      </div>
    </div>
  </div>
</div>
@endsection 