<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Test Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{ asset('___/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('___/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('___/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('___/js/bootstrap.js') }}"></script>
    <script src="{{ asset('___/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('___/js/aplikasi.js') }}"></script>
</head>

<body>
    <nav class="navbar navbar-findcond navbar-fixed-top">
        <div class="container ">
            <div class="navbar-header">
                <a class="navbar-brand" style="font-size:26px;">Test PMB</a>
            </div>
            <div id="navbar">
                <ul class="nav navbar-nav navbar-right text-right">
                    <li id="submit-button" style="display:none;"><a href="{{ url('ujian/submit') }}" onclick="return confirm('Yakin Ingin Submit?')">SUBMIT</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php 
    $mulai = $ujian->waktu_mulai;
    //dd($mulai);
    $date = date_create($mulai);
    date_add($date, date_interval_create_from_date_string($waktuujian.' minutes'));
    $selesai=date_format($date, 'Y-m-d H:i:s');
    $counter = date('F j, Y H:i:s',strtotime($selesai));
?>

    <div class="container" style="margin-top: 100px; padding-top:10px;">
        <div class="col-lg-12 row">
            <div class="alert col-md-9 step well" style=" border-color:blue; border-radius:0;">
                <form role="form" name="_form" method="post" id="_form" action="{{ route('user.jawab') }}">
                    @csrf
                    <span style='font-size:17px; color:blue;'>Soal Ujian</span>
                    <div class="step well" style="background-color:white;">
                        <table class="table table-form" style="font-size: 16px; color:black;">
                            <tr>
                                <td style="vertical-align: top;"><strong>{{ $no_soal }})</strong></td>
                                <td colspan="2">{!! $kerjakanSoal->soal->soal !!}</td>
                            </tr>
                            <tr>
                                <td width="5%"></td>
                                <td width="3%"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <?php if($kerjakanSoal->jawaban=='a') { $check_a="checked" ; } else { $check_a=""; } ?>
                                <td width="3%">A </td>
                                <td width="3%"><input {{ $check_a }} type="radio" id="opsi_a_{{$kerjakanSoal->soal_id}}"
                                        name="qjawaban" id="qjawaban" value="a"></td>
                                <td>{!! $kerjakanSoal->soal->a !!}</td>
                            </tr>
                            <tr>
                                <?php if($kerjakanSoal->jawaban=='b') { $check_b="checked" ; } else { $check_b=""; } ?>
                                <td width="3%">B</td>
                                <td width="3%"><input {{ $check_b }} type="radio" id="opsi_b_{{$kerjakanSoal->soal_id}}"
                                        name="qjawaban" id="qjawaban" value="b"></td>
                                <td>{!! $kerjakanSoal->soal->b !!}</td>
                            </tr>
                            <tr>
                                <?php if($kerjakanSoal->jawaban=='c') { $check_c="checked" ; } else { $check_c=""; } ?>
                                <td width="3%">C</td>
                                <td width="3%"><input {{ $check_c }} type="radio" id="opsi_c_{{$kerjakanSoal->soal_id}}"
                                        name="qjawaban" id="qjawaban" value="c"></td>
                                <td>{!! $kerjakanSoal->soal->c !!}</td>
                            </tr>
                            <tr>
                                <?php if($kerjakanSoal->jawaban=='d') { $check_d="checked" ; } else { $check_d=""; } ?>
                                <td width="3%">D</td>
                                <td width="3%"><input {{ $check_d }} type="radio" id="opsi_d_{{$kerjakanSoal->soal_id}}"
                                        name="qjawaban" id="qjawaban" value="d"></td>
                                <td>{!! $kerjakanSoal->soal->d !!}</td>
                            </tr>
                            <tr>
                                <?php if($kerjakanSoal->jawaban=='e') { $check_e="checked" ; } else { $check_e=""; } ?>
                                <td width="3%">E</td>
                                <td width="3%"><input {{ $check_e }} type="radio" id="opsi_e_{{$kerjakanSoal->soal_id}}"
                                        name="qjawaban" id="qjawaban" value="e"></td>
                                <td>{!! $kerjakanSoal->soal->e !!}</td>
                            </tr>
                        </table>
                    </div>


                    <table width="100%">
                        <tr>
                            <td style="text-align:right;">
                                <input type="hidden" name="nomor" value="{{ $no_soal }}">
                                @if($no_soal<$totalSoal) 
                                <input type="hidden" name="idsoal" id="hdn_nosoal" value="{{ $kerjakanSoal->soal_id }}">
                                <a href="{{ url('ujian/pilih_soal') }}/{{ $no_soal+1 }}" class="action next btn btn-primary">Next >></a>
                                <button id="_btnSimpan" name="btnSimpan" type="submit" style="display:none;">
                                @else
                                <input type="hidden" name="idsoal" id="hdn_nosoal" value="{{ $kerjakanSoal->soal_id }}">
                                <button id="_btnSimpan" name="btnSimpan" type="submit">
                                <a class="action btn btn-primary" href="{{ url('ujian/submit') }}">Submit</a>
                                @endif
                                <a class="btn btn-primary" href="{{ url('ujian/submit') }}" id="selesai_btn" style="display:none;">Submit</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            <div class="col-md-3  ">
                <div class="alert alert-success ctr"
                    style="border-color: green; color:green;  ">
                    <span style="font-size:14pt;"><strong>{{ Auth::guard('web')->user()->name }}</strong><span>
                </div>
                <div class="alert alert-warning ctr"
                    style="color:green; margin-top:-15px; border-color: orange; padding-top:-15px;">
                    Waktu mengerjakan tinggal : </br>
                    <div id="clock" style="display: inline; font-size: 40px; font-weight: bold"></div>
                </div>

                <div class="alert ctr "
                    style="margin-top:-15px; text-align: left; border-color: blue; padding-top:-15px;">
                    <strong>Lembar Jawaban : </strong>

                    <table width="100%" style="margin-top:10px;  ">
                    <?php
                        echo "<tr align='center'>";
                        $x=0;
                        $jawab_soal = array();
                        
                        $i=1;
                        foreach($semuaSoal as $r) {
                            $x++;
                            
                            $id = $r->id_soal;
                            $nmr = $r->no_soal;
                            $jaw = $r->jawaban;
                            $i++;
                            if($nmr==$no_soal){
                                $state = "alert-info";
                            }else{
                                if($jaw==""){
                                    $state = "alert-danger";
                                }else{
                                    $state = "alert-success";
                                }
                            }

                            if($x==6 || $x==11 || $x==16 || $x==21 || $x==26 || $x==31 || $x==36 || $x==41 || $x==46 || $x==51 || $x==56 || $x==61 || $x==66 || $x==71 || $x==76 || $x==81 || $x==86 || $x==91 || $x==96 || $x==101){
                                echo "</tr> <tr align='center'> <td width='10%''><div id='soal' class='".$state."' style='width:100%; padding:3px;'> <a href='".url('ujian/pilih_soal/'.$nmr)."'>".$nmr."</a></div></td>";
                            }else{
                                echo "<td width='10%''><div id='soal' class='".$state."' style=' width:100%; padding:3px;'><a href='".url('ujian/pilih_soal/'.$nmr)."'><strong>".$nmr."</strong></a></div></td>";
                            }
                        }
                    ?>
                    </table>
                </div>
            </div>
        </div>
        <div id="demo">
</body>

<script>
    var countDownDate = new Date("<?php echo $counter ?>").getTime();
    var x = setInterval(function () {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        if (distance < 0) {
            document.getElementById('selesai_btn').click();
            clearInterval(x);
            document.getElementById("clock").innerHTML = "EXPIRED";
        } else {
            document.getElementById("clock").innerHTML = hours + "j " +
                minutes + "m " + seconds + "d ";
            if(hours<=0){
                $('#submit-button').removeAttr('style');
            }
        }
    }, 1000);
    $('input[type=radio][name=qjawaban]').change(function () {
        $('#_btnSimpan').click();
    });

</script>

</html>
