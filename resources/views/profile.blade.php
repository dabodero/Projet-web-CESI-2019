@extends('layouts.app')
@section('title',"Mon profil")
@section('meta-description',"Profil de l'utilisateur, avec ses informations personnelles.")
@section('content')


{{-- Display all the reports --}}
@if(isset($reports))
    @foreach($reports as $report)
            <form class="statusBarReport pb-1 mb-1" method="post" action="deleteReport">
            @csrf
            <h4 class="pt-2 ml-2">{{$report->type}} a été signalé !</h4>
            <p class="ml-2">{{$report->text}}</p>
            <button type="submit" class="btn btn-light">Le problème est réglé</button>
            <a class="ml-2 nounderline" href="{{$report->link}}">Accéder au contenu</a>
			<input type="hidden" name="id_report" value="{{$report->id}}" />
        </form>
    @endforeach
@endif

{{-- Display all the command to deliver --}}
@if(isset($todeliver))
    @foreach($todeliver as $deliver)
            <form class="statusBarToDeliver pb-1 mb-1" method="post" action="setDeliverOrder">
            @csrf
            <h4 class="pt-2 ml-2">Une commande a été passé !</h4>
            @foreach($deliver->comanded as $comand)
                <p class="ml-2">   - {{$comand->quantity}}x {{$comand->article->name}}</p>
            @endforeach
            <button type="submit" class="btn btn-light">Commande livrée</button>
			<input type="hidden" name="id_order" value="{{$deliver->id}}" />
        </form>
    @endforeach
@endif

<div class="container">
    <div class="row">
        <div class="col-lg-1 col-md-4 col-sm-12 col-xs-12"></div>
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
            {{-- form start --}}                
            <form class="form-container rounded">
                @csrf
                {{-- title --}}                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="titleprofile-container rounded">
                        <p>
                            Profile
                        </p>
                    </div>
                </div>
                    {{-- Name --}}      
                    <div class="col-lg-12 order-lg-12 text-center">              
                        <div class="form-row">
                            <div class="name-container">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label></label>
                                    <div class="profileformname"><p>{{$user->last_name}}</p></div>
                                </div>
                            </div>
                            {{-- Firstname --}}                                
                            <div class="name-container">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                   <label></label>
                                   <div class="profileformname"><p>{{$user->first_name}}</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Icon --}}                
                    <div class="col-lg-4 order-lg-1 ">
                        <img src="{{$user->image->path}}" class="mx-auto img-fluid img-circle d-block" alt="{{$user->image->alt}}">
                        <h6 class="mt-2">
                            Uploader une autre photo
                        </h6>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input">
                            <span class="custom-file-control">Choisissez un fichier</span>
                        </label>
                    </div>
                    
                    {{-- Zone --}}                
                    <div class="col-lg-12 order-lg-11 text-center">              
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>Centre</label>
                                <h4>{{$user->campus->name}}</h4>
                            </div>
                        </div>
                    </div>
                    {{-- Mail --}}       
                    <div class="col-lg-12 order-lg-12 text-center">                       
                        <div class="form-group">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <label class="profileform">Mail</label>
                                <h4>{{$user->email}}</h4>
                            </div>
                        </div>
                    </div>
                </form>

                {{-- Differents buttons with differents uses according to their names --}}
                <a href="/disconnect"><button class="btn btn-danger my-2 my-sm-0"><i class="fas fa-user-slash"></i> Déconnexion</button></a>
                @if(Auth::user()->id_roles == 3)
                    <a href="/downloadAllImages"><button class="btn btn-info my-2 my-sm-0"><i class="fas fa-download"></i> Télécharger toutes les images</button></a>
                    <a href="/report"><button class="btn btn-danger my-2 my-sm-0"><i class="fas fa-flag"></i> Signaler</button></a>
                @endif
                @if(Auth::user()->id_roles == 2)
                    <a href="/admin/useradmin"><button class="btn btn-warning my-2 my-sm-0"><i class="fas fa-users-cog"></i> Gérer les utilisateurs</button></a>
                    <a href="/admin/"><button class="btn btn-danger my-2 my-sm-0"><i class="fas fa-tools"></i> Zone d'administration</button></a>
                @endif
            {{-- form end --}}                
            </div>
        </div>
    </div>
    
@endsection 