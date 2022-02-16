<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script>
        var $ = jQuery;
        </script>


        <script>




          //$(document).ready(function () {
            @php $APIURL = "http://localhost/ElegantThemesTest/wordpress-5.9/index.php/"; @endphp

            function ajaxMakeUser(uname,eml,psw,uid){

                      $.ajax({
                          type: "POST",
                          url: '{{$APIURL}}wp-json/wp/v2/users',
                          data: { 'username': uname, 'email': eml, 'password': psw, 'roles': 'subscriber', 'slug':'fromLaravel'+uid },

                          headers: {

                            'Accept': '*/*',
                            "authorization": "Basic",
                            'Cache-Control':'no-cache',
                          },
                          contentType: 'application/x-www-form-urlencoded',
                          success: function (data) {


                                console.log(data.id);
                                SaveItInMyDB(uid, data.id);

                          //  code	"existing_user_login"
                        },
                          error: function (data) {
            alert('User already exists.')
        }

                      });
                  }


                  function SaveItInMyDB(thisuid, wid) {
                    $.ajax({
                        type: "GET",
                        url: 'http://localhost/ElegantThemesTest/public/index.php/relate/'+thisuid+'/'+wid,


                        headers: {

                          'Accept': '*/*',
                          "authorization": "Basic",
                          'Cache-Control':'no-cache',
                        },
                        contentType: 'application/x-www-form-urlencoded',
                        success: function (data) {


                              console.log(data);
                              location.reload();

                        //  code	"existing_user_login"
                      },
                        error: function (data) {
                  alert('User already exists.')
                  }

                    });
                  }


                  function CheckInMyDB(thisuid,myid) {
                    $.ajax({
                        type: "GET",
                        url: '{{$APIURL}}wp-json/wp/v2/users/'+thisuid,


                        headers: {

                          'Accept': '*/*',
                          "authorization": "Basic",
                          'Cache-Control':'no-cache',
                        },
                        contentType: 'application/x-www-form-urlencoded',
                        success: function (data) {


                              console.log(data);


                        //  code	"existing_user_login"
                      },
                        error: function (data) {
                      // call function to del()
                      DelInMyDB(myid);
                  }

                    });
                  }



                  function DelInMyDB(thisuid) {
                    $.ajax({
                        type: "GET",
                        url: 'http://localhost/ElegantThemesTest/public/index.php/unrelate/'+thisuid,


                        headers: {

                          'Accept': '*/*',
                          "authorization": "Basic",
                          'Cache-Control':'no-cache',
                        },
                        contentType: 'application/x-www-form-urlencoded',
                        success: function (data) {

  location.reload();
                              console.log(data);
                              //location.reload();

                        //  code	"existing_user_login"
                      },
                        error: function (data) {
                  //alert('User already exists.')
                  }

                    });
                  }





          //});


        </script>



    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
