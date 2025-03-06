<form action="{{ url('/formulir/proses') }}" method="post">
    {{ csrf_field() }}
    <label>Nama:</label>
    <input type="text" name="nama"><br>
    <label>Alamat:</label>
    <input type="text" name="alamat"><br>
    <input type="submit" value="Simpan">
</form>