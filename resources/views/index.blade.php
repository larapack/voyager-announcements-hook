@extends('voyager::master')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-megaphone"></i> Announcements
    </h1>
@stop

@section('page_header_actions')

@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <?= $content; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
