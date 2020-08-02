@extends('layouts.frontend')

@section('content')

    <!-- Header -->
    <header class="header text-white h-fullscreen pb-0 overflow-hidden text-center mt-9" style="background-image: url(../assets/img/vector/16.png); background-color: #262a37;">
        <div class="overlay opacity-95" style="background-color: #262a37;"></div>
        <div class="container">
          <div class="row align-items-center h-100">

            <div class="col-md-8 mx-auto">
              <h1>Increase your conversion with TheSaaS</h1>
              <p class="lead mt-4 mb-7">An elegant, modern and fully customizable SaaS and WebApp template</p>
              <a class="btn btn-lg btn-round btn-primary px-7" href="#">Get started</a>
            </div>

            <div class="col-md-8 mx-auto align-self-end">
              <img class="mt-7" src="../assets/img/preview/laptop-2.png" alt="img" data-aos="fade-up">
            </div>

          </div>
        </div>
    </header>
    <div class="container mt-9">


        <div class="col-lg-12">




            <!--
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            | Basics
            |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
            !-->
            <section id="basics" class="section bb-1">
                <div class="container">
                <header class="section-header">
                    <h2>Basics</h2>
                    <hr>
                    <p>Understanding tabs and how to use navs and grids to create tabs.</p>
                </header>


                <div class="row">

                    <div class="col-lg-8 mx-auto">

                        <p>Basically, you can create a tab using any type of nav by adding few data attributes and companying it with a <code>.tab-content</code>. You can use Bootstrap grids to create vertical tabs. We provide both horizontal and vertical examples.</p>

                        <br>
                            <h5>MES DONNEES</h5>
                        <br>
                        <ul class="nav nav-tabs bg-dark" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab-home-1">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-profile-1">Parrainage</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-contact-1">Partenaires Directes</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-contact-3">Partenaires Indirects</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab-contact-2">Niveau</a>
                            </li>
                        </ul>

                        <div class="tab-content  p-4">

                            <div class="tab-pane fade show active" id="tab-home-1">

                                <h3 class="lead">Mes informations de compte</h3>

                                <div class="form-group text-white">
                                    <h2 class="bg-primary ">Pseudo: {{$pseudo}} </h2><hr>
                                    <h2 class="bg-danger">Email: {{$email}} </h2>
                                </div>


                            </div>


                            <div class="tab-pane fade" id="tab-profile-1">
                                <h3>Parrainer</h3>

                                @if ($parrainer)
                                    <p class="lead"> <a class="btn btn-danger" href="#">Vous avez deja parrainer </a> </p>
                                @else
                                    <p class="lead"> <a class="btn btn-primary" href="{{$lien}}">Partager mon lien de parrainnage</a> </p>
                                    <p> {{$lien}} </p>
                                @endif
                            </div>


                            <div class="tab-pane fade" id="tab-contact-1">
                                <h2>Mes Filleuls</h2>

                                <table class="table table-bordered text-white">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Prenoms</th>
                                            <th>Pseudo</th>
                                            <th>Date de parrainage</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-dark">

                                        @if ($filleuls->count() >0)
                                        <?php $i = 1 ?>

                                            @foreach ($filleuls as $filleul)
                                                <tr>
                                                    <td>
                                                        {{$i++}}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('filleul', ['code'=>$filleul->code]) }}" class="text-dark">{{$filleul->nom}}</a>
                                                    </td>
                                                    <td>{{$filleul->prenoms}}</td>
                                                    <td>{{$filleul->pseudo}}</td>
                                                    <td>{{$filleul->created_at}}</td>
                                                </tr>
                                            @endforeach
                                        @else

                                                <tr>
                                                    <td colspan="5" class="bg-danger">
                                                        <h3 class="text-center">Vous n'avez parrainez aucune personne</h3>
                                                    </td>
                                                </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="tab-contact-3">
                                <h2>Mes sous Filleuls</h2>

                                <table class="table table-bordered text-white table-hover">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Prenoms</th>
                                            <th>Pseudo</th>
                                            <th>Parrain</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-dark">

                                        @if ($filleuls->count() >0)
                                        <?php $i = 1 ?>

                                            @foreach ($mesfilleuls as $filleuls)

                                                @foreach ($filleuls as $value)

                                                    <tr>
                                                        <td>
                                                            {{$i++}}
                                                        </td>
                                                        <td>
                                                            {{$value->nom}}
                                                        </td>
                                                        <td>{{$value->prenoms}}</td>
                                                        <td>{{$value->pseudo}}</td>
                                                        <td> {{$value->code_parrain}} </td>
                                                    </tr>

                                                @endforeach

                                            @endforeach
                                        @else

                                                <tr>
                                                    <td colspan="5" class="bg-danger">
                                                        <h3 class="text-center">Vous n'avez parrainez aucune personne</h3>
                                                    </td>
                                                </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="tab-contact-2">
                                Mon Niveau
                                <h2 class="bg-primary text-white">Niveau: {{$niveau}} </h2><hr>
                            </div>
                        </div>


                        <hr class="my-7">

                    </div>
                </div>

                </div>
            </section>
        </div>
    </div>
@endsection


