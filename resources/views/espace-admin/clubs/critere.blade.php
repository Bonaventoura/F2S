@extends('espace-admin.include.frontend')

@section('content')

    @section('title')
        Backend | Insertion des membres du Club
    @endsection
    @section('title1')
        Choix de critère 
    @endsection
    <!-- Main content -->
    <section class="content">
        <div class="row">
            
            <div class="col-12">
                @include('layouts.messages')
                <div class="card">
                    <div class="card-header">

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('clubs.create') }}" method="post" class="form-horizontal">
                            @csrf

                            <div class="form-group">
                                <label for="">Choisir un Club</label>
                                <div class="row">
                                    <select name="groupe_id" id="" class="form-control">
                                        @foreach ($groupes as $item)
                                            <option value="{{$item->id}}"> {{$item->nom}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--  }}
                            <div class="form-group">
                                <label for="">Ville</label>
                                <div class="row">
                                    <input type="text" name="ville" id="ville" value="" class="form-control">
                                </div>
                            </div>--}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-sm btn-primary"><span class="fa fa-save"></span>Save Transaction</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
      <!-- /.content -->


@endsection
