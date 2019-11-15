@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-4 col-sm-12 col-xs-12"></div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                {{-- form start --}}                
                <form class="form-container rounded">
                    @csrf
                   {{-- title --}}                
                    <div class="col-md-12 col-sm-12 col-xs-12" align="center">
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
                                    <label for="inputName"></label>
                                    <div class="profileformname"><p>{{$user->last_name}}</p></div>
                                </div>
                            </div>
                            {{-- Firstname --}}                                
                            <div class="name-container">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                   <label for="inputFirstname"></label>
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
                            <label for="inputCenter"><div class="profileform">Centre</div></label>
                            <h4>{{$user->campus->name}}</h4>
                        </div>
                    </div>
                </div>
                    {{-- Mail --}}       
                    <div class="col-lg-12 order-lg-12 text-center">                       
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label for="inputEmail"><div class="profileform">Mail</div></label>
                            <h4>{{$user->email}}</h4>
                        </div>
                    </div>
                </div>
                </form>
                <a href="/disconnect"><button class="btn btn-danger my-2 my-sm-0"><i class="fas fa-user-slash"></i> Déconnexion</button></a>
            {{-- form end --}}                
            </div>
        </div>
    </div>
    
@endsection 