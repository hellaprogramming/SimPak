@extends('layouts.master')
@section('title', 'Informasi Pajak')
@section('content')
@foreach($data as $item)
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-info-circle fa-1x"></i> {{ $item->Judul }}</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        {{ $item->Konten  }}
    </div>
</div>
@endforeach
@stop