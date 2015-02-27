@extends('layouts.master')
@section('title','Master Pajak')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-file-text fa-1x"></i> Master Data Pajak</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        @include('layouts.alert')
        <table class="table table-striped table-bordered table-hover" >
            <thead>
                <tr>
                    <th>Nama Pajak</th>
                    <th>Nama Kategori Pajak</th>
                    <th style="width: 150px;">Kode Jenis Pajak</th>
                    <th style="width: 170px;">Kode Jenis Setoran</th>
                    <th>Tarif</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data))
                    @foreach($data as $data)
                    {? $tarif = $data->Tarif * 100 ?}
                    <tr>
                        <td>{{ $data->NamaPajak }}</td>
                        <td>{{ $data->NamaSetoran}}</td>
                        <td style="text-align: center">{{ $data->KodeJenisPajak }}</td>
                        <td style="text-align: center">{{ $data->KodeJenisSetoran }}</td>
                        <td style="text-align: center">{{ $tarif }}%</td>
                        <td><a onclick="getDataJenisPajak('{{ $data->id_JenisSetoran }}')" class="btn btn-success"
                               rel="tooltip" data-placement="top" title="Edit Master Pajak">
                                <i class="fa fa-edit fa-fw"></i></a></td>
                    </tr>
                    @endforeach
                @else
                <tr>
                    <td colspan="5" class="danger">Tidak Terdapat Data Pajak</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<div class="modal-editMasterPajak">
    <!--untuk modal detail user-->
</div>
@stop

@section('jsorjquery')
<script type="text/javascript">
    function getDataJenisPajak(idJenisSetoran){
        $().ready(function(){
            $.ajax({
                url: '{{ URL::to("data-pajak/edit-pajak/'+idJenisSetoran+'") }}',
                success: function(html){
                    $(".modal-editMasterPajak").empty();
                    $(".modal-editMasterPajak").show().html(html);
                    $('#modal-editMasterPajak').modal();                
                }
            });
        });
    }
</script>
@stop