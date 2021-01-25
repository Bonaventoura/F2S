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
                        <div class="col-12 col-sm- name=""4">
                            <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Estimated budget</span>
                                <span class="info-box-number text-center text-muted mb-0">{{number_format($projet->apport_personnel,2)}} FCFA</span>
                            </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm- name=""4">
                            <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Total budget</span>
                                <span class="info-box-number text-center text-muted mb-0">{{number_format($projet->cout_projet,2)}}</span>
                            </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm- name=""4">
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
                            <h4>Recent Activity</h4>
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" name="" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                    <span class="username">
                                        <a href="#">{{$account->nom}} {{$account->prenoms}} </a>
                                    </span>
                                    <span class="description">publié le : {{$projet->created_at->format('d-m-Y')}} </span>
                                </div>
                                <!-- /.user-block -->
                                <p>

                                </p>

                            </div>

                            <div class="post clearfix">
                                <div class="user-block">
                                    <h4>Téléchargement de fichiers</h4>
                                    <small>Veuillez télécharger l'exemplaire de carneva du projet</small>
                                </div>
                                <!-- /.user-block -->

                                <p>
                                    <a href="{{ route('carneva.download') }}" id="carneva" class="link-black text-sm" name=""><i class="fas fa-link mr-1"></i>Carneva-fr.xls</a>
                                </p>
                            </div>

                            <div class="post">
                                <div class="user-block">
                                    <h4>Upload de vos fichiers</h4>
                                    <small>Envoyez votre fichier de carneva du projet</small>
                                </div>
                                <!-- /.user-block -->
                                <div class="col-lg-12">
                                    <form id="form_upload" data-route="{{ route('carneva.upload') }}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="projet_id" id="projet_id" value=" {{$projet->id}} ">

                                        <div class="row col-lg-8 form-group custom_file_wrp">
                                            <div class="custom-file">
                                                <input type="file"  name="fichier" id="fichier">
                                                <label  for="fichier" id="label_file">Uploader</label>
                                            </div>

                                        </div>
                                        <div id="filename">Fichier</div>

                                        <div class="form-group">
                                            <button type="submit" id="btn_file" class="btn btn-success" disabled>
                                                <i class="fa fa-save"></i>Envoyer
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <p>
                                    <a href="#" class="link-black text-sm" name=""><i class="fas fa-link mr-1"></i> Demo File 1 v1</a>
                                </p>
                            </div>
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
                        <p class="text-sm" name="">Client Company
                            <b class="d-block">Deveint Inc</b>
                        </p>
                        <p class="text-sm" name="">Project Leader
                            <b class="d-block">{{$account->nom}} {{$account->prenoms}} </b>
                        </p>
                    </div>

                    <h5 class="mt-5 text-muted">Project files</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> {{$projet->plan_affaire}}</a>
                        </li>
                    </ul>
                    <div class="text-center mt-5 mb-3">
                    <a href="#" class="btn btn-sm  name=""btn-primary">Add files</a>
                    <a href="#" class="btn btn-sm  name=""btn-warning">Report contact</a>
                    </div>
                </div>
            </div>
        </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <div class="card shadow-lg">
        <div class="card-header bg-success">
            <h3 class="card-title">Confirmation de demande de prêt </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="alert alert-success" id="msg_div" style="display: none"></div>
                <div class="col-lg-7" id="">
                    <form id="form_confirm" data-route="{{ route('confirmation') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <h4>Information pour confirmation du projet</h4>
                        <input type="hidden" name="projet_id" id="projet_id" value=" {{$projet->id}} ">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-sm" name="nom_parrain" id="nom_parrain" placeholder="name@example.com">
                            <label for="nom">Nom du parrain</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-sm" name="prenoms_parrain" id="prenoms_parrain" placeholder="Password">
                            <label for="prenoms_parrain">Prénoms</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-sm" name="fonction" id="fonction" placeholder="name@example.com">
                            <label for="fonction">Fonction du parrain</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control form-control-sm"  name="email_address" id="email_address" placeholder="Password">
                            <label for="email_address">Adresse email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-sm"  name="telephone" id="telephone" placeholder="Password">
                            <label for="telephone">Numéro de téléphone</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control form-control-sm"  name="calendrier_realisation" id="calendrier_realisation" placeholder="Password">
                            <label for="calendrier_realisation">Calendrier de réalisation du projet</label>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success">Envoyer</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5">

                </div>
            </div>
        </div>
    </div>

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

        $('#form_upload').submit(function (e) {
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

                    }
                }
            });

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
