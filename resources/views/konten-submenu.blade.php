<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konten Submenu</title>
</head>
<body>
    <h1>Konten untuk Submenu: {{ $submenu->nama_submenu }}</h1>

    @if($kontenSubMenu->isEmpty())
        <p>Tidak ada konten untuk submenu ini.</p>
    @else
        @foreach($kontenSubMenu as $konten)
            <div>
                <h2>{{ $konten->judul }}</h2>
                <p>{{ $konten->deskripsi_konten }}</p>
                @if($konten->gambar)
                    <img src="{{ $konten->gambar }}" alt="{{ $konten->judul }}" style="max-width: 200px;">
                @endif
                @if($konten->file)
                    <p><a href="{{ Storage::url($konten->file) }}">Download File</a></p>
                @endif
                <p>Status: {{ $konten->status }}</p>
                <p>Tanggal: {{ $konten->tanggal }}</p>
            </div>
        @endforeach
    @endif
</body>
</html>
