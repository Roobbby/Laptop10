@extends('back.layout.index')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard')
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <!-- Page header section  -->
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <h1>Hi, Welcomeback!</h1>
                        <span>JustDo Dashboard,</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
