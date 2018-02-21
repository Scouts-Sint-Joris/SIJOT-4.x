@extends('layouts.backend')

@section('title')
    <h1> Overzicht</h1>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Overzicht</li>
    </ol>
@endsection

@section('content')
    <div class="row"> {{-- Info boxes --}}
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-home"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Verhuringen</span>
                    <span class="info-box-number">90</span>
                </div>{{-- /.info-box-content --}}
            </div>{{-- /.info-box --}}
        </div> {{-- /.col --}}
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Logins</span>
                    <span class="info-box-number">0</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
