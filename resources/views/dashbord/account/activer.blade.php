@extends('dashbord.layouts.content')


@section('page')

    <h2 class="text-center">Activation de compte</h2>

    <div class="col-lg-12">
        <div class="card card ">

            <div class="card-body">
                <h4 class="text-center bg-primary">ACTIVATION DE COMPTE</h4><hr>
                <form action="{{ route('activer.store') }}" method="post">
                    @csrf
                    <div class="col-lg-6">

                        <h4>Informations personnelles</h4>

                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" name="nom" id="nom" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="prenoms">Prenoms</label>
                                <input type="text" name="prenoms" id="prenoms" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="sexe">Sexe</label>
                                <select name="sexe" id="sexe" class="form-control">
                                    <option value="masculin">Masculin</option>
                                    <option value="feminin">Feminin</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="date_n">Date de naissance</label>
                                <input type="date" name="date_n" id="date_n" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="num_tel">Votre numero de contact</label>
                                <input type="tel" name="num_tel" id="num_tel" class="form-control">
                            </div>

                    </div>

                    <div class="col-lg-6 bg-dark">
                        <h4>Informations de compte</h4>

                        <div class="form-group">
                            <label for="pseudo_parrain">Pseudo du parrain</label>
                            <input type="text" name="pseudo_parrain" id="pseudo_parrain" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>



                        <div class="form-group">
                            <label for="pseudo">Votre pseudo</label>
                            <input type="text" name="pseudo" id="pseudo" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password Confirm</label>
                            <input type="password" name="password_conf" id="password_conf" class="form-control">
                        </div>
                    </div>

                    <div class="form-group text-center">

                        <button type="submit" class="btn btn-primary">S'inscrire</button>

                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
