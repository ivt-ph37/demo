<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div id='list-cate'></div>
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <form id="create-cate" action="" method="POST">
                    <input type="text" name="name">
                    <button type='submit'>Add</button>
                </form>
            </div>
        </div>

        <script type="text/javascript">
            
            $(document).ready(function () {
                $('#create-cate').submit(function(e){
                    e.preventDefault();

                    $.ajax({
                        url : 'api/v1/categories',
                        type: 'post',
                        data: {
                            'name' : $('input[name=name]').val()
                        },
                        success : function(data){
                            console.log(data);
                            var html= '<table>'+
                                    '<thead>'+
                                        '<tr>'+
                                        '<td>Name</td></tr>'+
                                    '</thead>'+
                                    '<tbody>';
                            $.each(data,function(key, value) {

                                html += '<tr><td>'+value.name+'</td></tr>';
                                
                            });
                            html += '</tbody>'+
                            '</table>';
                            console.log(html);
                            $('#list-cate').html('');
                            $('#list-cate').append(html);

                        }
                    }) ;          
                })
            });
        </script>
    </body>
</html>
