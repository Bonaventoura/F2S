<!-- Generation 1 3 filleuls -->
@if ($nbresF >= 1 )
<div class="post">
    <h4 class="text-center">Génération 1</h4>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Simple Full Width Table</h3>

            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table id="example2" class="table table-bordered table-responsive-lg">
                <thead class="bg-primary">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nom & Prénoms </th>
                        <th>Tel</th>
                        <th>Email</th>
                        <th>Nom du Parrain</th>
                        <th>Date de parrainage</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($filleuls->count() >0)
                    <?php $i = 1 ?>

                        @foreach ($filleuls as $filleul)
                            <tr>
                                <td>
                                    {{$i++}}
                                </td>
                                <td>
                                    {{$filleul->nom}} {{$filleul->prenoms}}
                                </td>
                                <td>{{$filleul->num_tel}}</td>
                                <td>{{$filleul->email}}</td>
                                <td>{{$account->nom}}</td>
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
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>
@else
<p class="btn btn-block btn-dark">Niveau 1 pas encore atteint</p>
@endif

<!-- /.Generation 1 -->

<!-- Generation 2 9 filleuls -->
@if ($nbresF >= 4)
<div class="post clearfix">
    <h4 class="text-center">Génération 2</h4>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Simple Full Width Table</h3>

            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table id="exemple1" class="table table-bordered table-responsive-lg">
                <thead class="bg-primary">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prenoms</th>
                        <th>Parrain</th>
                        <th>Date de Parrainage</th>
                    </tr>
                </thead>
                <tbody class="bg-dark">

                    @foreach ($generation_deux as $filleuls)

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
                                <td> {{$value->created_at}} </td>
                            </tr>

                        @endforeach

                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@else
<p class="btn btn-block btn-dark">Niveau 2 pas encore atteint</p>
@endif

<!-- /.Generation 2 -->
@if ($nbresF < 10)
{{-- ici le client n'a pas encore bouclé les 2 premières étapes --}}
<p class="btn btn-block btn-dark">Niveau inferieur incomplet</p>
@else
<!-- Generation 3 27 filleuls -->
@if ($nbresF >= 10 )
<div class="post clearfix">
    <h4 class="text-center">Génération 3</h4>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Simple Full Width Table</h3>

            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table id="exemple1" class="table table-bordered table-responsive-lg">
                <thead class="bg-primary">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prenoms</th>
                        <th>Parrain</th>
                        <th>Date de Parrainage</th>
                    </tr>
                </thead>
                <tbody class="bg-dark">

                    @foreach ($gen3 as $filleuls)

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
                                <td> {{$value->created_at}} </td>
                            </tr>

                        @endforeach

                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@else
    <p>Niveau pas encore atteint</p>
@endif

<!-- /.Generation 3 -->

<!-- Generation 4 -->
@if ($nbresF >= 28)
    <div class="post clearfix">
        <h4 class="text-center">Génération 4</h4>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Simple Full Width Table</h3>

                <div class="card-tools">
                    <ul class="pagination pagination-sm float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table id="exemple1" class="table table-bordered table-responsive-lg">
                    <thead class="bg-primary">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prenoms</th>
                            <th>Parrain</th>
                            <th>Date de Parrainage</th>
                        </tr>
                    </thead>
                    <tbody class="bg-dark">

                        @foreach ($gen4 as $filleuls)

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
                                    <td> {{$value->created_at}} </td>
                                </tr>

                            @endforeach

                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@else
    <p>Niveau pas encore atteint</p>
@endif
<!-- /.Generation 4 -->

<!-- Generation 5 -->
@if ($nbresF >= 82)
    <div class="post clearfix">
        <h4 class="text-center">Génération 5</h4>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Simple Full Width Table</h3>

                <div class="card-tools">
                    <ul class="pagination pagination-sm float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table id="exemple1" class="table table-bordered table-responsive-lg">
                    <thead class="bg-primary">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prenoms</th>
                            <th>Parrain</th>
                            <th>Date de Parrainage</th>
                        </tr>
                    </thead>
                    <tbody class="bg-dark">

                        @foreach ($gen5 as $filleuls)

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
                                    <td> {{$value->created_at}} </td>
                                </tr>

                            @endforeach

                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@else
    <p>Niveau pas encore atteint</p>
@endif

<!-- /.Generation 5 -->

<!-- Generation 6 -->
@if ($nbresF >= 244)
    <div class="post clearfix">
        <h4 class="text-center">Génération 6</h4>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Simple Full Width Table</h3>

                <div class="card-tools">
                    <ul class="pagination pagination-sm float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table id="exemple1" class="table table-bordered table-responsive-lg">
                    <thead class="bg-primary">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prenoms</th>
                            <th>Parrain</th>
                            <th>Date de Parrainage</th>
                        </tr>
                    </thead>
                    <tbody class="bg-dark">

                        @foreach ($gen6 as $filleuls)

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
                                    <td> {{$value->created_at}} </td>
                                </tr>

                            @endforeach

                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@else
    <p>Niveau pas encore atteint</p>
@endif

<!-- /.Generation 6 -->

<!-- Generation 7 -->
@if ($nbresF >= 730)
    <div class="post clearfix">
        <h4 class="text-center">Génération 7</h4>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Simple Full Width Table</h3>

                <div class="card-tools">
                    <ul class="pagination pagination-sm float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table id="exemple1" class="table table-bordered table-responsive-lg">
                    <thead class="bg-primary">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prenoms</th>
                            <th>Parrain</th>
                            <th>Date de Parrainage</th>
                        </tr>
                    </thead>
                    <tbody class="bg-dark">

                        @foreach ($gen7 as $filleuls)

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
                                    <td> {{$value->created_at}} </td>
                                </tr>

                            @endforeach

                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@else
    <p>Niveau pas encore atteint</p>
@endif

<!-- /.Generation 7 -->

<!-- Generation 8 -->
@if ($nbresF >= 2188)
    <div class="post clearfix">
        <h4 class="text-center">Génération 8</h4>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Simple Full Width Table</h3>

                <div class="card-tools">
                    <ul class="pagination pagination-sm float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table id="exemple1" class="table table-bordered table-responsive-lg">
                    <thead class="bg-primary">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prenoms</th>
                            <th>Parrain</th>
                            <th>Date de Parrainage</th>
                        </tr>
                    </thead>
                    <tbody class="bg-dark">

                        @foreach ($gen8 as $filleuls)

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
                                    <td> {{$value->created_at}} </td>
                                </tr>

                            @endforeach

                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@else
    <p>Niveau pas encore atteint</p>
@endif

<!-- /.Generation 8 -->
@endif
