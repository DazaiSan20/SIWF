<form action="{{ url('/formulir/proses') }}" method="post">
    {{ csrf_field() }}
    <label>Nama:</label>
    <input type="text" name="nama"><br>
    <label>Umur:</label>
    <input type="text" name="umur"><br>
    <input type="submit" value="Simpan">
</form>