@extends('layouts.master')
@section('title','404 Not Found')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="well col-lg-12" style="margin: 30px auto;" >
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">ERROR CODE : "<span style="color: #d21616">404 Not Found</span>"</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    REQUEST GAGAL ...<br/>HALAMAN <b>{{ $URL }}</b> TIDAK TERSEDIA
                </div>
            </div>
        </div>
    </div>
</div>
@stop