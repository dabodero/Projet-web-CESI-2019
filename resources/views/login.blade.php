@extends('layouts.app')
@section('title',"Connexion")
@section('meta-description',"Page pour se connecter pour les utilisateurs ayant déjà un compte.")
@section('content')

<div class="bg4">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-12 col-xs-12"></div>
			<div class="col-md-4 col-sm-12 col-xs-12">
        {{-- form start --}}            
        {{-- Title --}}            
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="title-container rounded">
						<h1>Connexion</h1>
					</div>
				</div>
				{{-- End of title --}}            
				<form class="form-container rounded center_div" method="POST" action="/login">
					@csrf                        
					<div class="form-group">
						<label for="exampleInputEmail1">Adresse mail</label>
						<input type="email" class="form-control @error('inputEmail') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter email" name="inputEmail">                    
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Mot de passe</label>
						<input type="password" class="form-control @error('inputPassword') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password" name="inputPassword">
					</div>

					<button type="submit" class="btn btn-primary btn-block text-white">Se connecter</button>

					<div class="parts">
						<a href="{{action('UsersController@register')}}"> Pas encore inscrit ?</a>
					</div>
					{{--Error--}}                                
					@error('inputEmail')                        
					<div class="invalid-feedback">
						The email is not correct                        
					</div>
					@enderror            
				</form>
				{{-- form end --}}          
			</div>
		</div>
	</div>
</div>
@endsection