@extends('layouts.frontend')

@section('page')

    <!-- Header -->

    <!--End Header -->
    <div class="container ">


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
                            <?php $i = 1 ?>
                            @if ($filleuls->count() >0)
                                {{$i = 1}}
                                @foreach ($filleuls as $filleul)
                                    <tr>
                                        <td>
                                            {{$i++}}
                                        </td>
                                        <td>
                                            <a href="{{ route('filleul', ['code'=>$filleul->code]) }}" class="btn  btn-outline-dark">{{$filleul->nom}}</a>

                                        </td>
                                        <td>{{$filleul->prenoms}}</td>
                                        <td>{{$filleul->pseudo}}</td>
                                        <td>{{ $filleul->created_at}}</td>
                                    </tr>
                                @endforeach
                            @else

                                    <tr>
                                        <td colspan="5" class="bg-danger">
                                            <h3 class="text-center">Ce filleul n'a encore parrainé personne</h3>
                                        </td>
                                    </tr>
                            @endif
                        </tbody>
                    </table>

                </div>
            </section>
        </div>
        <a href="javascript:history.back()" class="btn btn-danger">Retour</a>
    </div>
@endsection


