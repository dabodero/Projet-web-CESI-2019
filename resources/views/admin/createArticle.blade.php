@extends('layouts.app')
@section('title',"Ajouter un article")
@section('meta-description',"Page permettant d'ajouter un article à la boutique")
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-2 col-sm-12 col-xs-12"></div>
		<div class="col-md-8 col-sm-12 col-xs-12">
			<div class="col-md-12 col-sm-12 col-xs-12 text-center">
				<div class="title-container rounded">
					<h1>Ajouter un article</h1>
				</div>
			</div>
			<!-- Form for add an article -->
			<form class="form-container rounded" action="/admin/new-article" method="post">
				@csrf
				<br>
				<div class="form-row">
					<label>Titre de l'article</label>
					<input type="text" name="title" class="form-control mb-2" placeholder="ex : Tasse " value="" />
					<label>Description de l'article</label>
					<textarea name="text" class="form-control reportSize mb-2" placeholder="Décrivez votre article"></textarea>
					<label>Prix (en €)</label>
					<input type="number" name="price" class="form-control mb-2" value="" />
					<label>Stock</label>
					<input type="number" name="stock" class="form-control mb-2" placeholder="Quantité" value="1" min="0" />
					<label class="mt-3">Catégorie</label>
					<select id="inputCenter" class="form-control" name="category">
						<!-- Select a category -->
						@foreach($categories as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
					<p>Ou</p>
					<!-- Create a category -->
					<input type="text" name="custom_category" class="form-control" placeholder="ex : Sport " value="" />
				</div>
				<br>
				<br>
				<button type="submit" class="btn btn-cesi btn-block text-white">Ajouter l'article</button>
			</form>
		</div>
	</div>
</div>
@endsection
