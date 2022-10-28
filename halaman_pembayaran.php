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
      <label>Jenis Kegiatan</label>
      <br>
      <select name="jenis_kegiatan" type="input"  tabindex="7" required>
      <option value=" " >Pilih Jenis Kegiatan</option>
      <option>Kegiatan 1</option>
      <option>Kegiatan 2</option>
      <option>Kegiatan 3</option>
      <option>Kegiatan 4</option>
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
      <input placeholder="Nominal Rp." type="text" tabindex=11 required>
    </fieldset>
    <fieldset>
      <label>Metode Pembayaran</label>
      <br>
      <select name="metode_pembayaran" type="input"  tabindex="12" required>
      <option value=" " >Pilih Metode Pembayaran</option>
      <option>Tripay</option>
      <option>Midtrans</option>
      </select>
    <fieldset>
      <br>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</div>
</body>
</html>