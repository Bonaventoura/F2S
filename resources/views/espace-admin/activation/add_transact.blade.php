@extends('espace-admin.include.frontend')

@section('content')

<div class="card card-primary">
    <div class="card-header">
        Ajouter nouvelle transaction
    </div>
    <div class="card-body">
        <form action="{{ route('activations.store') }}" method="post" class="form-horizontal">
            @csrf
            <div class="form-group">
                <label>Mode de Paiement</label>
                <select name="mode_id" id="mode_id" class="form-control form-control-sm" >
                    <option value="0">Choisir un mode de payement</option>
                    @foreach ($modes as $item)
                        <option value="{{$item->id}}">{{$item->nom_mode}}</option>
                    @endforeach
                </select>
                <span id="error"></span>
            </div>


            <div id="tmoney_moov" style="display: none">
                <div class="form-group" >
                    <label>Numero d'envoi</label>
                    <input class="form-control form-control-sm" name="numero_envoi" value=" {{old('numero_envoi')}} " type="text" placeholder="Entrez le numero d'envoi">
                </div>

                <div class="form-group">
                    <label for="codeRef">Code de Reference</label>
                    <input class="form-control form-control-sm" name="codeRef" value=" {{old('codeRef')}} " type="number" >
                </div>
            </div>

            

            <div class="form-group" style="display: none" id="west_union" >
                <label>Numero MTCN WEST UNION</label>
                <input class="form-control form-control-sm" name="numero_mtcn" id="numero_mtcn" value=" {{old('numero_mtcn')}}" maxlength="11"  type="text" placeholder="Votre adresse e-mail">
            </div>

            <div class="form-group" style="display: none" id="money_gram" >
                <label>Numero de Reference Money Gram</label>
                <input class="form-control form-control-sm" name="money_gram" id="money_gram" maxlength="9" value=" {{old('money_gram')}} " type="text" placeholder="Votre adresse e-mail">
            </div>
            
            <div class="form-group">
                <label for="">Montant Envoyé</label>
                <div class="row">
                    <input type="number" name="montant" id="montant" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="">Date Envoi</label>
                <div class="row">
                    <input type="date" name="date_envoi" id="" class="form-control">
                </div>
            </div>

            <center>
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary"><span class="fa fa-save"></span>Save Transaction</button>
                </div>
            </center>
            
        </form>
    </div>
    <a href="{{ route('activations.index') }}" class="btn btn-sm btn-danger"><span class="fa fa-angle-left">Retour</span></a>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>

        <script type="text/javascript">

            $(document).ready(function() {
                $('#mode_id').change(function() {
                    var selectedValue = $(this).val();
                    
                    console.log(selectedValue);
                    
                    if (selectedValue == 0) {
                        $("#error").html("<p class='alert alert-danger'>Veuillez choisir un mode de paiement svp</p>");


                    }else if (selectedValue == 1 || selectedValue == 2) {
                        $("#tmoney_moov").show();
                        $("#money_gram").hide();
                        $("#west_union").hide();
                        $("#error").html("");

                    }else if(selectedValue == 3) {
                        $("#west_union").show();
                        $("#tmoney_moov").hide();
                        $("#money_gram").hide();
                        $("#error").html("");
                    }else {
                        $("#money_gram").show();
                        $("#west_union").hide();
                        $("#tmoney_moov").hide();
                        $("#error").html("");
                    }

                    

                });

            }); 

        </script>
    

@endsection

