<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Sistem</title>
        <link rel="icon" type="image/png" href="assets/img/DinasPUicon.png"/>
        <!-- Core CSS - Include with every page -->
        {{ HTML::style('assets/css/bootstrap.min.css') }}
        {{ HTML::style('assets/font-awesome/css/font-awesome.css') }}
        <!-- SB Admin CSS - Include with every page -->
        {{ HTML::style('assets/css/sb-admin.css') }}
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header" style="text-align: center;"><img src="assets/img/DinasPU.jpg" height="60px" draggable="false" style="margin-bottom: -20px;margin-left: -60px; "/><span style="margin-left: 30px;">SISTEM PAJAK DINAS PEKERJAAN UMUM<br/>KUTAI TIMUR</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    @include('layouts.alert')
                    <div class="login-panel panel panel-default" style="margin-top: 10px">
                        <div class="panel-heading">
                            <h3 class="panel-title">SILAHKAN MASUK</h3>
                        </div>
                        <div class="panel-body">
                            {{ Form::open(array('url'=>'login')) }}
                            <div class="col-md-4">
                                <div class="form-group" style="text-align: center">
                                    <img src="assets/img/admin.png" height="150px" draggable="false" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username"  name="username" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button type="submit" class="btn btn-lg btn-success btn-block">Masuk</button>
                                </fieldset>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Core Scripts - Include with every page -->
        {{ HTML::script('assets/js/jquery-1.10.2.js') }}
        {{ HTML::script('assets/js/bootstrap.min.js') }}
        {{ HTML::script('assets/js/plugins/metisMenu/jquery.metisMenu.js') }}
        <!-- SB Admin Scripts - Include with every page -->
        {{ HTML::script('assets/js/sb-admin.js') }}

    </body>

</html>
