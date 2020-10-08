
@extends('layouts.app-template')
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Message Management
            </h1>
            <ol class="breadcrumb">
                <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
                <li class="active">Message Management</li>
            </ol>
        </section>
        @yield('action-content')

    </div>
@endsection
