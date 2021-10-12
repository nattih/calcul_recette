<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Calcul-recette') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="container">
            <div class="row">
              <div class="col-md-12 text-center">
                <h6 class="animate-charcter"> MON TABLEUR DE RECETTE</h6>
              </div>
            </div>
          </div> 
            <div class="col-md-10">
                <div class="card ">
                    <div class="card-header font-weight-bold  text-center">{{ __('Enregistrement recette') }}</div>
                    <div class="card-body d-flex justify-content-center">
                        <form action="{{route('enreg')}}" method="post" id="recette_form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                              <div class="form-group col-md-4">
                                <label class="font-weight-bold">Libellé :</label>
                                <input type="text" class="form-control @error('libelle') is-invalid @enderror"  name="libelle" placeholder="" value="{{ old('libelle') }}">
                                  @error('libelle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                              </div>
                              <div class="form-group col-md-4">
                                <label class="font-weight-bold"> Quantité :</label>
                                <input type="text" class="form-control @error('quantite') is-invalid @enderror"  name="quantite" placeholder="" value="{{ old('quantite') }}">
                                  @error('quantite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                              </div> 
                              <div class="form-group col-md-4">
                                <label class="font-weight-bold"> prix :</label>
                                <input type="text" class="form-control @error('quantite') is-invalid @enderror"  name="prix" placeholder="" value="{{ old('prix') }}">
                                  @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                              </div> 
                            </div> 
                            <div class="form-group d-flex float-right col-auto">
                              <button type="submit" class="btn btn-info  ">Ajouter</button>
                              <button type="reset" class="btn btn-dark ml-2  ">Annuler</button>
                            </div>         
                          </form>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header font-weight-bold  text-center">{{ __('Tableau recette') }} 
                            <button class="float-right col-auto font-weight-bold  ">  Recette total: <span class="text-danger "> {{ number_format($totalRecette, 2, '.', ' ')}} f CFA</span></button>
                        </div>
                        <div class="card-body d-flex">
                            <div class="table table-responsive p-0">
                                <table id="example1" class="table table-hover">
                                  <thead class="">
                                  <tr class=" btn-sm bg-dark text-white text-center">
                                    <th scope="col">Date de saisie</th>
                                    <th scope="col">Libellé</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Prix (f CFA)</th>
                                    <th scope="col">Recette (f CFA)</th>
                                  </tr>
                                  </thead>
                                  <tbody >
                                    @foreach($recettes as $recette)
                                  <tr class="tablecolor text-center">
                                    <td class=" font-weight-bold">{{$recette->created_at->format('d/m/y à H:m')}}</td>
                                    <td>{{$recette->libelle}}</td>
                                    <td>{{$recette->quantite}}</td>
                                    <td>{{number_format($recette->prix, 2, '.', ' ') }}</td>
                                    <td class="text-danger font-weight-bold"> {{number_format($recette->recette, 2, '.', ' ') }}</td>
                                  </tr>
                              </tbody>
                                @endforeach
                            </table>
                        </div>
                        {{$recettes->links()}}
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
