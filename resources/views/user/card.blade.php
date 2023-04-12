<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Card Member</title>
    <style>
        .container{
            position: absolute;
            top: 145px;
            left: 316px;
            /* font-: 8; */
        }

        .wa{
            position: absolute;
            top: 180px;
            left: 316px;
            /* font-: 8; */
        }

        
        .ig{
            position: absolute;
            top: 215px;
            left: 316px;
            /* font-: 8; */
        }

        .yt{
            position: absolute;
            top: 255px;
            left: 316px;
            /* font-: 8; */
        }


        .sp{
            position: absolute;
            top: 290px;
            left: 316px;
            /* font-: 8; */
        }

        .lok{
            position: absolute;
            top: 320px;
            left: 316px;
            /* font-: 8; */
        }

        .tt{
            position: absolute;
            top: 360px;
            left: 316px;
            /* font-: 8; */
        }

        .idr{
            position: absolute;
            top: 150px;
            left: 30px;
            /* font-: 8; */
        }


        .nama{
            position: absolute;
            top: 345px;
            left: 45px;
            /* font-size: 50; */
            /* font-: 8; */
        }
        p{
            font-size: 30PX;
            color: rgb(1, 1, 1);
        }


        .gambar{
            position: absolute;
            top: 180px;
            left: 45px;
            width: 160px;
            height: 173px;
            /* font-: 8; */
        }

        td { 
            font-size: 12px 
        }
    </style>
</head>
<body>

<div class="container">

    @foreach ($servisanq as $no => $v)

    <table border="0" >
        @if ($v->fb =="")

        <tr>
            <td>-</td>
        </tr>
        

        @elseif($v->fb)

        <tr>
        <td>{{$v->fb}} </td>
       </tr>
        @endif
    </table>

</div>



<div class="wa">

    <table border="0" >

        @if ($v->wa =="")

        <tr>
            <td>-</td>
        </tr>

        @elseif($v->wa)

        <tr>
            <td>{{$v->wa}}</td>
        </tr>

        @endif

    </table>

</div>



<div class="ig">

    <table border="0" >

        @if ($v->ig =="")

        <tr>
            <td>-</td>
        </tr>


        @elseif($v->ig)

        <tr>
            <td>{{$v->ig}}</td>
        </tr>

        @endif

    </table>

</div>


<div class="yt">

    <table border="0" >

        @if ($v->yt =="")

  
<tr>
    <td>-</td>
</tr>


        @elseif($v->yt)

        <pre class="yt"></pre>
        <tr>
            <td>{{$v->yt}} </td>
        </tr>
        

        @endif


    </table>

</div>


<div class="sp">

    <table border="0" >

        @if ($v->sp =="")

           
<tr>
    <td>-</td>
</tr>


            @elseif($v->sp)

            <tr>
                <td>{{$v->sp}} </td>
            </tr>

            @endif
    </table>

</div>


<div class="lok">

    <table border="0" >

        @if ($v->alamat =="")

        <tr>
            <td>-</td>
        </tr>


        @elseif($v->alamat)

        <tr>
            <td>{{$v->alamat}}</td>
        </tr>

        @endif

    </table>

</div>


<div class="tt">

    <table border="0" >

        @if ($v->tt =="")

        
<tr>
    <td>-</td>
</tr>


        @elseif($v->tt)

        <tr>
            <td>{{$v->tt}}</td>
        </tr>

        @endif

    </table>

</div>


<div class="idr">

    <table border="0" >

        @if ($v->username =="")

        
        <tr>
            <td>-</td>
        </tr>
        
        
                @elseif($v->username)
        
                <tr>
                    <td>{{$v->username}}</td>
                </tr>
        
                @endif

    </table>

</div>

<div class="nama"> 
<p> {{$v->nama_mitra}}</p>
</div>

<img class="gambar" src="{{asset('img/'.$v->gambar_bengkel)}}" alt="">

@endforeach

    <img src="{{asset('res/member.png')}}" alt="" width="500" height="500">
</body>
</html>

<script>
    window.print();
</script>