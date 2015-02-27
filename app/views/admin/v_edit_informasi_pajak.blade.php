<form class="update-informasi">
    <div class="form-group">
        <label class="col-lg-2 control-label">Judul</label>
        <div class="col-lg-10">
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input class="form-control" name="judul" type="text" value="{{ $data->Judul }}"/>
        </div>
    </div>
    <div class="form-group">
        <label style="margin-top: 10px;" class="col-lg-2 control-label">Konten</label>
        <div class="col-lg-10" style="margin-top: 10px;">
            <textarea class="form-control konten2" name="konten" style="height: 400px;">{{ $data->Konten }}</textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-2" style="margin-top: 20px;"></div>
        <div class="col-lg-10" style="margin-top: 20px;text-align: right">
            <button class="btn btn-primary" type="submit"><i class="fa fa-edit fa-1x"></i> UPDATE</button>
            <a class="btn btn-default tbl-batal">BATAL</a>
        </div>
    </div>
</form>

<script type="text/javascript">
    $('.konten2').wysihtml5({
        "image" : false,
        "link" : false
    });
    $(document).ready(function(){
        $('.update-informasi').submit(function(e){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url: '{{ URL::to("master-informasi-pajak/update-pajak") }}',
                data: $(this).serialize()
            }).done(function(data){
                if(data.error){
                    $('.for-alert').empty();
                    alert_message('danger', data.error, '.for-alert');
                    $('html, body').animate({scrollTop:300}, 'slow');
                }else{
                    $(location).attr('href','{{ URL::to("master-informasi-pajak") }}');
                }
            });
        });       
       
        $('.tbl-batal').on('click', function(){
            $('.for-alert').empty();
            $("#master-informasi-edit").empty();
            $("#master-informasi").show();
            $('html, body').animate({scrollTop:0}, 'slow');
        });
    });
</script>