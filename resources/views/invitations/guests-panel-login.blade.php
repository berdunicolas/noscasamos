<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Invitados</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="{{asset('guest-admin/css/panel.css')}}">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="{{asset('guest-admin/js/jquery-1.8.2.min.js')}}"></script>
        <script src="{{asset('guest-admin/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('guest-admin/js/main.js')}}"></script>

        <link href="{{asset('assets/css/icons/css/all.min.css')}}" rel="stylesheet">
        <link href="https://cdn.datatables.net/v/dt/dt-2.0.8/b-3.0.2/b-html5-3.0.2/datatables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.css" rel="stylesheet">
    </head>
    <body>
        <div class="image"></div>
        <div class="login">
            <h2>Lista de invitados</h2>
            <p>Ingresa el <b>código de su evento</b> para acceder</p>
            <form id="login-form" class="login-form" name="form1" method="post" action="{{route('invitation.guests.login', ['invitation' => $invitation->path_name])}}">
                @csrf

                <input id="password" name="password" type="password" placeholder="*****"/><br/>
                <button name="submit" type="submit" value="Ingresar">Ingresar</button>
                {{--@php if ($error) { @endphp
                    <em>
                        <label class="err" for="password" generated="true" style="display: block;"><?php echo $error ?></label>
                    </em>
                @php } @endphp--}}
            </form>
            <a href="https://evnt.ar" target="_blank"><b>Evnt</b>.ar</a>
        </div>
    </body>
</html>

