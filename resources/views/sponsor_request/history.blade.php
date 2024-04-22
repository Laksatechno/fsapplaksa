<!-- resources/views/sponsor_request/history.blade.php -->

<table class="table table-hover table-bordered" id="sponsor-table" class="table" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Jenis Sponsor</th>
            <th>Jumlah Rupiah</th>
            <th>Waktu Kegiatan</th>
            <th>Status</th>
            <!-- Tambahkan kolom-kolom lain yang ingin ditampilkan -->
        </tr>
    </thead>
    <tbody>
        @foreach($requests as $request)
            <tr>
                <td>{{ $request->jenis_sponsor }}</td>
                <td>{{ $request->jumlah_rupiah }}</td>
                <td>{{ $request->waktu_kegiatan }}</td>
                <td>{{ $request->status }}</td>
                <!-- Tambahkan kolom-kolom lain yang ingin ditampilkan -->
            </tr>
        @endforeach
    </tbody>
</table>
