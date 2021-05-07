@extends('espace_client.include.frontend')

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card shadow-lg">
        <div class="card-header">
            <h3 class="card-title">Projects Detail</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>

            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-4 col-sm- name=""4">
                            <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Apport personnel du projet</span>
                                <span class="info-box-number text-center text-muted mb-0">{{number_format($projet->apport_personnel,2)}} FCFA</span>
                            </div>
                            </div>
                        </div>
                        <div class="col-4 col-sm- name=""4">
                            <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Total budget</span>
                                <span class="info-box-number text-center text-muted mb-0">{{number_format($projet->cout_projet,2)}}</span>
                            </div>
                            </div>
                        </div>
                        <div class="col-4 col-sm- name=""4">
                            <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Durée du projet</span>
                                <span class="info-box-number text-center text-muted mb-0">{{$projet->duree_projet}} <span>
                            </span></span></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4>Tâches à effectuer</h4>
                            <div class="post clearfix">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" name="" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                    <span class="username">
                                        <a href="#">{{$account->nom}} {{$account->prenoms}} </a>
                                    </span>
                                    <span class="description">publié le : {{$projet->created_at->format('j-M-Y')}} </span>
                                </div>
                                
                            </div>

                            @if ($carneva == 0 && $calendar == 0)
                            <div class="post clearfix">
                                <div class="user-block">
                                    <h4>Téléchargement de fichiers</h4>
                                    <small>
                                        Veuillez cliquer ci-dessous pour télécharger le carneva projet de F2S et<br>
                                        le calendrier de réalisation des activités du projet <br>
                                        à remplir conjointement et à renvoyer plus tard pour étude et approbation 
                                    </small>
                                </div>
                                <!-- /.user-block -->

                                <div class="lang">
                                    <form action="" method="get">
                                        <div class="form-group">
                                            <label for="my-select">Veuillez selectionnez les fichiers selon la version linguistique </label>
                                            <select id="version_lang" class="form-control" name="version_lang">
                                                <option value="">Selectionnez la version de fichiers</option>
                                                <option value="fr">Version Française</option>
                                                <option value="eng">Version Anglaise</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>

                                <div class="file_eng" style="display: none">
                                    <h4>Version Anglaise </h4>
                                    <p>
                                        <a href="{{ route('carneva.download') }}" id="carneva" class="link-black text-sm" name=""><i class="fas fa-link mr-1"></i>Carneva-projet F2S</a>
                                    </p>
                                </div>

                                <div class="file_fr" style="display: none"> 
                                    <h4>Version Française</h4>
                                    <p>
                                        <a href="{{ route('carneva.download') }}" id="carneva" class="link-black text-sm" name=""><i class="fas fa-link mr-1"></i>Carneva-projet F2S</a>
                                    </p>
                                </div>

                                
                            </div>
                            @else
                                <h4 class="alert alert-success">
                                    Etape 1 : Téléchargement et envoie de fichiers ===> Fait <br>
                                    Etape 2 : Confirmation de demande de pret ====> En cours
                                </h4>
                            @endif
                            


                            @include('layouts.messages')
                            @if ($carneva == 0)
                            <div class="post clearfix" id="upload_carneva">
                                <div class="user-block">
                                    <h5>Charger votre carneavs de projet</h5>
                                    <small>
                                        Veuillez charger ci-dessous votre fichier carnevas-projet F2S déjà remplie pour étude <br>
                                        puis cliquer sur le bouton envoyer 
                                    </small>
                                </div>
                                <!-- /.user-block -->
                                <div class="col-lg-12">
                                    <form id="form_upload" action="{{ route('carneva.upload') }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="projet_id" id="projet_id" value=" {{$projet->id}} ">

                                        <div class="row col-lg-8 form-group custom_file_wrp">
                                            <div class="custom-file">
                                                <input type="file"  name="fichier" id="fichier">
                                                <label  for="fichier" id="label_file">Charger le fichier</label>
                                            </div>
                                            <br> <br> <br> 
                                            <div class="form-group">
                                                <button type="submit" id="btn_file" class="btn btn-success" disabled>
                                                    <i class="fa fa-save"></i> Envoyer le fichier
                                                </button>
                                            </div>

                                        </div>
                                        <div id="filename">Fichier</div>

                                        
                                    </form>
                                </div>
                                
                            </div>
                            @endif

                            @if ($carneva == 1 && $calendar ==0 )
                            <div class="post clearfix" id="upload_calendar">
                                <div class="user-block">
                                    <h5>Charger le calendrier de réalisation des activités de votre projet </h5>
                                    <small>
                                        Veuillez charger ci-dessous votre fichier de confirmation-projet F2S déjà remplie pour étude <br>
                                        puis cliquer sur le bouton envoyer 
                                    </small>
                                </div>
                                <!-- /.user-block -->
                                <div class="col-lg-12">
                                    <form id="upload" action="{{ route('calendar.upload') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="projet_id" id="projet_id" value=" {{$projet->id}} ">

                                        <div class="form-group">
                                            <label for="calendar">Fiche de réalisation projet</label>
                                            <input id="calendar" class="form-control" type="file" name="calendar">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" id="btnFile" class="btn btn-success" disabled >
                                                <i class="fa fa-save"></i> Envoyer le fichier
                                            </button>
                                        </div>
                                        <div id="filename">Fichier</div>  
                                    </form>
                                </div>
                                
                            </div>
                            @endif
                            
                            

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{$projet->nom_projet}}</h3>
                    <p class="text-muted">
                        {{$projet->description}}
                    </p>
                    <br>
                    <div class="text-muted">
                        {{--<p class="text-sm" name="">Client Company
                            <b class="d-block">Deveint Inc</b>
                        </p>--}}
                        <p class="text-sm" name="">Project Leader
                            <b class="d-block">{{$account->nom}} {{$account->prenoms}} </b>
                        </p>
                    </div>

                    <h5 class="mt-5 text-muted">Documents du projet  </h5>
                    <ul class="list-unstyled">
                        <li>
                            <h5>Plan d'affaire :</h5>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> {{$projet->plan_affaire}}</a>
                        </li>
                        <li>
                            <h5>Carnevas projet :</h5>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> {{$projet->plan_affaire}}</a>
                        </li>
                        <li>
                            <h5>Calendrier projet :</h5>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> {{$projet->plan_affaire}}</a>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    @if ($carneva == 1 && $calendar == 1)
    <div class="card shadow-lg" id="card_confirm">
        <div class="card-header bg-success">
            <h3 class="card-title">Confirmation de demande de financement du projet {{$projet->nom_projet}} </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">

            @if ($confirm_at == 0)
            <div class="row">
                <div class="alert alert-success" id="msg_div" style="display: none"></div>
                <div class="col-lg-12" id="">
                    <form id="form_confirm" data-route="{{ route('confirmation') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <h4>Information du parrain de votre projet <small> (Parents, ou amis) </small></h4>
                        
                        <input type="hidden" name="projet_id" id="projet_id" value=" {{$projet->id}} ">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-sm" name="nom_parrain" id="nom_parrain" placeholder="name@example.com">
                            <label for="nom">Nom du parrain</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-sm" name="prenoms_parrain" id="prenoms_parrain" placeholder="Password">
                            <label for="prenoms_parrain">Prénoms du parrain</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-sm" name="fonction" id="fonction" placeholder="name@example.com">
                            <label for="fonction">Fonction du parrain</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control form-control-sm"  name="email_address" id="email_address" placeholder="Password">
                            <label for="email_address">Adresse email du parrain</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-sm"  name="telephone" id="telephone" placeholder="Password">
                            <label for="telephone">Numéro de téléphone du parrain</label>
                        </div>
                        {{--<div class="form-floating mb-3">
                            <input type="file" class="form-control form-control-sm"  name="calendrier_realisation" id="calendrier_realisation" placeholder="Password">
                            <label for="calendrier_realisation">Calendrier de réalisation du projet</label>
                        </div>--}}

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success">
                                <i class="fa fa-send"> Envoyer ma confirmation </i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">

                </div>
            </div>
            @else
                <h4 class="alert alert-success">
                    Projet {{$projet->nom_projet}} déjà confirmer, en attente de fonds de financement
                </h4>
            @endif
            
        </div>
    </div>
    @endif
    

</section>


<style>
    .custom_file_wrp{
        display: flex;
    }
    #filename{
        background:rgb(28, 156, 71);
        padding: 15px 15px;
        border: 1px solid #ddd;
        margin-right: 15px;
        color: #ddd;
        display: none;
    }
    .custom-file input[type="file"]{
        display: none;
    }
    .custom-file label{
        cursor: pointer;
        background: #ed1c24;
        display: inline-block;
        color: #fff;
        padding: 14px 15px;
        text-align: center;
    }
</style>

<script type="text/javascript">
    $(document).ready(function () {
        //alert('jquery load successfully');

        $('#version_lang').change(function (e) { 
            e.preventDefault();
            var version = $(this).val();
            console.log(version);

            if (version == 'fr') {
                $('.file_fr').show();
                $(".file_eng").hide();
            } else if (version == 'eng') {
                $('.file_fr').hide();
                $(".file_eng").show();
            }else {
                $('.file_fr').hide();
                $(".file_eng").hide();
            }
        });

        $('#fichier').change(function (e) {
            e.preventDefault();
            var fichier = e.target.files[0].name;
            console.log(fichier);

            if (fichier !== '' && fichier.length >0) {
                $('#btn_file').removeAttr('disabled');
                $('#label_file').html(fichier);
                $('#filename').show();
                $('#filename').html(fichier);
            } else {
                $('#bnt_file').attr('disabled', 'disabled');
            }
        }); 

        $('#calendar').change(function (e) {
            e.preventDefault();
            var fichier = e.target.files[0].name;
            console.log(fichier);

            if (fichier !== '' && fichier.length >0) {
                $('#btnFile').removeAttr('disabled');
                $('#filename').show();
                $('#filename').html(fichier);
            } else {
                $('#bntFile').attr('disabled', 'disabled');
            }
        }); 

        

        $('#form_confirm').submit(function (e) {
            e.preventDefault();
            var route = $(this).data('route');
            var form_data = new FormData(this);

            $.ajax({
                type: "POST",
                url: route,
                data: form_data,
                dataType: "JSON",
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response)
                    if (response.success) {
                        $('#msg_div').show();
                        $('#msg_div').html(response.success);
                        document.getElementById('form_confirm').reset();

                        setTimeout(function () {
                            $('#msg_div').hide();

                        },10000)
                    }
                }
            });

        });

    });
</script>
@endsection
