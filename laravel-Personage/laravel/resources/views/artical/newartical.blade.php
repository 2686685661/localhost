@extends('queenCommon.template')

@section('connect')

    <div class="col-lg-11 col-md-11 col-sm-11 alert alert-info">
        <h3 class=" text-center">Compose New Notification</h3>

        @include('queenCommon.validator')

        <div class="hr-div"> <hr></div>

        <div class="col-md-10">
            <h3>Basic Form Examples</h3>

            @include('artical._form')

        </div>

    </div>


@stop