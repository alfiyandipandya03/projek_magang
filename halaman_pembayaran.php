<?php 
  $tripay_api_key = 'DEV-Lhhc0I8IteikldJ943RnnLUFsEBSduqigAXph6ag';
  $url = 'https://tripay.co.id/api-sandbox/merchant/payment-channel';

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_FRESH_CONNECT => true,
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HEADER => false,
    CURLOPT_HTTPHEADER => ['Authorization: Bearer '.$tripay_api_key],
    CURLOPT_FAILONERROR => false
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);
  $response = json_decode($response)->data;
  $bank = [];
  $icon = [];
  $code = [];

  foreach ($response as $data) {
    $temp = $data->name;
    $bank[] = $temp;
    $icon += [$temp => $data->icon_url];
    $code += [$temp => $data->code];
  }
  
 
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="form.css">
  <title>Halaman Pembayaran</title>
</head>
<body>
<div class="container">  
  <form id="contact" method="post">
    <h3>Form Pembayaran</h3>
    <h4>Isilah kolom-kolom berikut dengan data anda!</h4>
    <table>
    <fieldset>
      <label>Nama Depan</label>
      <br>
      <input placeholder="Nama Depan" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <label>Nama Belakang</label>
      <br>
      <input placeholder="Nama Belakang" type="text" tabindex="2" required autofocus>
    </fieldset>
    </table>
    <fieldset>
      <label>Nama Instansi/Perusahaan</label>
      <br>
      <input placeholder="Nama Instansi/Perusahaan" type="text" tabindex="3" required autofocus>
    </fieldset>
    <fieldset>
      <label>Alamat Instansi/Perusahaan</label>
      <br>
      <input placeholder="Alamat Instansi/Perusahaan" type="text" tabindex="4" required autofocus>
    </fieldset>
    <fieldset>
      <label>Email</label>
      <br>
      <input placeholder="Email Address" type="email" tabindex="5" required>
    </fieldset>
    <fieldset>
      <label>Nomor Whatsapp</label>
      <br>
      <input placeholder="Your Phone Number" type="text" tabindex="6" required>
    </fieldset>
    <fieldset>
      <label>Jenis Paket</label>
      <br>
      <select name="jenis_paket" type="input"  tabindex="7" id="jenis_paket" onchange="gantiLimit()" required>
      <option value=" " >Pilih Jenis Paket</option>
      <option value="1">Paket 1</option>
      <option value="2">Paket 2</option>
      <option value="3">Paket 3</option>
      <option value="4">Paket 4</option>
      </select>
    </fieldset>
    <fieldset>
      <label>Tanggal Kegiatan</label>
      <br>
      <input placeholder="Tanggal Kegiatan" type="date" tabindex="8" required>
    </fieldset>
    <fieldset>
      <label>Lokasi Kegiatan</label>
      <br>
      <input placeholder="Lokasi Kegiatan" type="text" tabindex="9" required>
    </fieldset>
    <fieldset>
      <label>Durasi</label>
      <input placeholder="Durasi" type="time" tabindex="10" required>
    </fieldset>
    <fieldset>
      <label>Harga yang disepakati</label>
      <br>
      <input placeholder="Nominal Rp." type="number" tabindex=11 required name="harga" id="harga" min="0" max="100000"> <span id="limitHarga" style="display:none">Limit Harga Tawar: Rp.</span>
      <br>
      <input type="checkbox" name="nego" id="nego" onclick="munculLimitHarga()"> <label for="nego">Nego</label>
    </fieldset>
    <fieldset>
      <label>Metode Pembayaran</label>
      <br>
      <div id="pembayaran">
        <?php 
        // print_r( empty($response) ? $err : $code);
          foreach ($bank as $banks) {
            $search = ['Virtual Account',' (Open Payment)'];
            $replace = ['VA', ''];
            echo "
            <div id='bank'>
              <input type='radio' id='$code[$banks]' name='metode_pembayaran' value='$code[$banks]'>
              <div>
                <label for='$code[$banks]'>
                  <img src='$icon[$banks]' class='icon'>
                  <br>
                  ".str_replace($search, $replace, $banks)."
                </label>
              </div>
            </div>
            
            ";
          }
           
        ?>
      </div>
      <!-- <select name="metode_pembayaran" type="input"  tabindex="12" required>
      <option value=" " >Pilih Metode Pembayaran</option>
      <option>Tripay</option>
      <option>Midtrans</option>
      </select> -->
    <fieldset>
      <br>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</div>
</body>
</html>

<script>
  var harga1=50000;
  var harga2=80000;
  var harga3=90000;
  var harga4=120000;

  var hargaMin = harga1;

  var checkBox = document.getElementById("nego");
  var text = document.getElementById("limitHarga");
  var harga = document.getElementById("harga");

  function munculLimitHarga() {
  if (checkBox.checked == true){
    text.style.display = "inline";
    text.innerHTML = "Limit Harga Tawar: Rp." + hargaMin
    harga.min = hargaMin;
    harga.value = hargaMin;
  } else {
     text.style.display = "none";
     harga.min = 0;
     harga.value = "0";
  }
}

function gantiLimit() {
  var j_paket = document.getElementById("jenis_paket").value
  if (j_paket == 1) {
    hargaMin = harga1
  } else if (j_paket == 2) {
    hargaMin = harga2
  } else if (j_paket == 3) {
    hargaMin = harga3
  } else if (j_paket == 4) {
    hargaMin = harga4
  }
  if (checkBox.checked == true){
    text.innerHTML = "Limit Harga Tawar: Rp." + hargaMin
    harga.min = hargaMin;
    harga.value = hargaMin;
  } 
}
</script>