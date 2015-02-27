@extends('layouts.master')
@section('title','Master Pajak')
@section('styleload')
    {{ HTML::style('assets/css/plugins/wysihtml5/bootstrap-wysihtml5.css') }}
@stop
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-file-text fa-1x"></i> Master Informasi Pajak</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-10">
            <table class="table table-striped table-bordered table-hover" >
                <thead>
                    <tr>
                        <th style="width: 40px;" >No</th>
                        <th>Judul</th>
                        <th style="width: 100px;text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {? $no = 1 ?}
                    @foreach($data as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->Judul }}</td>
                        <td style="text-align: center">
                            <a onclick="getDataInformasiPajak('{{ $data->id }}')" class="btn btn-success"
                               rel="tooltip" data-placement="top" title="Edit Informasi">
                                <i class="fa fa-edit fa-1x"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br/><br/>
<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-10 for-alert">@include('layouts.alert')</div>
    </div>
    <div class="col-lg-10 " id="master-informasi">
        <div class="form-group">
            <label class="col-lg-2 control-label">Judul</label>
            <div class="col-lg-10">
                <input class="form-control" type="text" disabled/>
            </div>
        </div>
        <div class="form-group">
            <label style="margin-top: 10px;" class="col-lg-2 control-label">Konten</label>
            <div class="col-lg-10" style="margin-top: 10px;">
                <textarea class="form-control konten" disabled style="height: 400px;"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-3" style="margin-top: 20px;"></div>
            <div class="col-lg-9" style="margin-top: 20px;text-align: right">
                <a class="btn btn-primary" disabled ><i class="fa fa-edit fa-1x"></i> UPDATE</a>
                <a class="btn btn-default" disabled>BATAL</a>
            </div>
        </div>
    </div>
    <div class="col-lg-10 " id="master-informasi-edit">
        <!--untuk edit master informasi pajak-->
    </div>
</div>
@stop

@section('jsload')
    {{ HTML::script('assets/js/plugins/wysihtml5/wysihtml5-0.3.0.min.js') }}
    {{ HTML::script('assets/js/plugins/wysihtml5/bootstrap3-wysihtml5.js') }}
@stop

@section('jsorjquery')
<script type="text/javascript">
    function getDataInformasiPajak(id){
        $().ready(function(){
            $.ajax({
                url: '{{ URL::to("master-informasi-pajak/edit-pajak/'+id+'") }}',
                success: function(html){
                    $("#master-informasi").hide();
                    $("#master-informasi-edit").html(html);
                    $('html, body').animate({scrollTop:300}, 'slow');
                }
            });
        });
    }
    $('.konten').wysihtml5({
        "image" : false,
        "link" : false
    });
</script>
@stop