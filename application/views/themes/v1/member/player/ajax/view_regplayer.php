<h2>Registrasi Klub</h2>
<table>
    <tr>
        <td>Klub Sekarang</td>
    	<td>
    		<?php /*?>
	    		<select name="id_club">
	    			<option value="">Pilih Club</option>
	    			<?php foreach ($clubs->data as $cl): ?>
		    			<option value="<?= $cl->slug; ?>"><?= $cl->name; ?></option>
	    			<?php endforeach ?>
	    		</select>
    		<?php */ ?>
    		<input type="text" id="club" name="club" placeholder="Nama Klub" class="form_keyup" action="member" fn="list_club" wait loading="off">
    		<input type="hidden" name="slug" id="slug">
    		<div id='showclub'>

    		</div>
    	</td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>
            <input type="text" name="name">
        </td>
    </tr>
    <tr>
        <td>No. Kartu Keluarga</td>
        <td>
            <input type="text" name="no_kk">
        </td>
    </tr>
    <tr>
        <td>Kartu Keluarga</td>
        <td>
            <input type="file" name="file_kk">
        </td>
    </tr>
    <tr>
        <td>No. KTP atau NIK</td>
        <td>
            <input type="number" name="no_ktp">
        </td>
    </tr>
    <tr>
        <td>KTP (Jika sudah punya)</td>
        <td>
            <input type="file" name="file_ktp">
        </td>
    </tr>
    <tr>
        <td>Akte Kelahiran</td>
        <td>
            <input type="file" name="file_akte">
        </td>
    </tr>
    <tr>
        <td>Ijazah</td>
        <td>
            <input type="file" name="file_ijazah">
        </td>
    </tr>
    <tr>
        <td>Passport</td>
        <td>
            <input type="file" name="file_passport">
        </td>
    </tr>
    <tr>
        <td>Buku Rekening</td>
        <td>
            <input type="file" name="file_bukurek">
        </td>
    </tr>
    <tr>
        <td>KTP Ibu Kandung</td>
        <td>
            <input type="file" name="file_ibukandung">
        </td>
    </tr>
    <tr>
        <td>Surat Rekening SSB</td>
        <td>
            <input type="file" name="file_srtrekssb">
        </td>
    </tr>
</table>

<script type="text/javascript">

	function select_club(elem)
	{
		var slug = $(elem).attr('slug');
		var club = $(elem).attr('club');
		console.log(club);
		$('#club').val(club);
		$('#slug').val(slug);
		$('#showclub').attr('style', 'display:none');
		
	}

</script>