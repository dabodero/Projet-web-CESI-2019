@extends('layouts.app')
@section('title',"Ajouter un événement")
@section('meta-description',"Page permettant d'ajouter un événement")
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-2 col-sm-12 col-xs-12"></div>
		<div class="col-md-8 col-sm-12 col-xs-12">
			{{-- title --}}
			<div class="col-md-12 col-sm-12 col-xs-12 text-center">
				<div class="title-container rounded">
					<h1>Ajouter un nouvel évenement</h1>
				</div>
			</div>
			<!-- Form for add an event -->
			<form class="form-container rounded" action="/admin/new-event" method="post">
				@csrf
				<br>
				<div class="form-row">
					<label>Titre de l'événement</label>
					<input type="text" name="title" class="form-control mb-2" placeholder="ex : BattleDev "/>
					<label>Description de l'évenement</label>
					<textarea name="text" class="form-control reportSize mb-2" placeholder="Décrivez votre évenement (contenu, lieu, conditions)"></textarea>
					<label>Coût de l'inscription</label>
					<input type="number" name="price" class="form-control mb-2" value="0" min="0" />
					<label>Date de début</label><input class="form-control mb-2" type="date" name="start_date">
					<label>Date de fin</label><input class="form-control mb-2" type="date" name="end_date">
					<div class="form-check">
						<input type="checkbox" name="recurrent" class="form-check-input mb-2">
						<label>Récurrent</label>
					</div>
					{{-- <input type="file" name="image" class="form-control float-center mb-2"> --}}
				</div>
				<br>
				<button type="submit" class="btn btn-cesi btn-block text-white">Ajouter l'évenement</button>
			</form>
			{{-- form end --}}
		</div>
	</div>
</div>
@endsection

