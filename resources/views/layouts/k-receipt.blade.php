<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="UTF-8">
  <title>Template Faktur Untuk Kasir HTML</title>


  <style>

@page {
    margin: 0;
}

#invoice-POS{
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding:2mm;
  margin: 0 auto;
  width: 44mm;
  background: #FFF;


::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  font-size: 1.5em;
  color: #222;
}
h2{font-size: .9em;}
h3{
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
p{
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}

#top, #mid,#bot{ /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}

#top{min-height: 80px;}
#mid{min-height: 80px;}
#bot{ min-height: 50px;}

#top .logo{
	height: 60px;
	width: 60px;
}

.info{
  display: block;
  //float:left;
  margin-left: 0;
}
.title{
  float: right;
}
.title p{text-align: right;}
table{
  width: 100%;
  border-collapse: collapse;
}
td{
  //padding: 5px 0 5px 15px;
  //border: 1px solid #EEE
}
.tabletitle{
  //padding: 5px;
  font-size: .6em;
  background: #EEE;
}
.service{border-bottom: 1px solid #EEE;}
.item{width: 20mm;}
.itemtext{font-size: .6em;}

#legalcopy{
  margin-top: 5mm;
}



}
    </style>

<script>
  window.console = window.console || function(t) {};
</script>



  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


</head>

<body translate="no" >


  <div id="invoice-POS">

    <center id="top">
        <div class="logo">
            <img src="{{ asset('assets/images/logo.png')}}" alt="" class="imglogo" style="width: 200%; margin-top:-50%; margin-left:-50%;">
        </div>
      </center><!--End InvoiceTop-->

      <div id="mid">
        <div class="info">
            <h2>Lugusranu</h2>
          <p>
            Alamat : Jl. Raya Ranuklindungan-Grati, Pasuruan - Jawa Timur </br>
            Pusat oleh-oleh dan klinik UMKM Khas Pasuruan </br>
            "Jagonya Selera Pasuruan" </br>
          </p>
        </div>
      </div><!--End Invoice Mid-->

    <div id="bot">
                    <div id="table">
                        <table>
                            <tr class="tabletitle">
                                <td class="item"><h2>Item</h2></td>
                                <td class="Hours"><h2>Qty</h2></td>
                                <td class="Rate"><h2>Sub Total</h2></td>
                            </tr>
                            @for ($i = 0; $i < count($items); $i++)
                                <tr class="service">
                                    <td class="tableitem"><p class="itemtext">{{ $items[$i] }}</p></td>
                                    <td class="tableitem"><p class="itemtext">{{ $stk[$i] }}</p></td>
                                    <td class="tableitem"><p class="itemtext">Rp. {{ $harga[$i] }}</p></td>
                                </tr>
                            @endfor

                            <tr class="tabletitle">
                                <td></td>
                                <td class="Rate"><h2>Total</h2></td>
                                <td class="payment"><h2>Rp. {{number_format($receipt['totalall']),0,',','.'}}</h2></td>
                            </tr>

                            <tr class="tabletitle">
                                <td></td>
                                <td class="Rate"><h2>Tunai</h2></td>
                                <td class="payment"><h2>Rp. {{$receipt['uang_bayar']}}</h2></td>
                            </tr>

                            <tr class="tabletitle">
                                <td></td>
                                <td class="Rate"><h2>Kembalian</h2></td>
                                <td class="payment"><h2>Rp. {{$receipt['kembalian']}}</h2></td>
                            </tr>

                        </table>
                    </div><!--End Table-->

                    <div id="legalcopy">
                        <p class="legal"><strong>Terimakasih Telah Berbelanja!</strong></br>
                          Beli online </br>
                          Shopee    : shopee.com/lugusranu </br>
                          Tokopedia : tokopedia.com/lugusranu </br>
                        </p>
                    </div>

                </div><!--End InvoiceBot-->
  </div><!--End Invoice-->

  <script>
    window.print();
    var url = '{{ route("khome") }}';
    window.location.href=url;
  </script>
</body>
</html>
