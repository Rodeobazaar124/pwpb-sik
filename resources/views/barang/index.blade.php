<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }} ">
        <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <x-Aside/>
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <ul>
                <li>Kelola</li>
                <li>Barang</li>
            </ul>
        </div>
    </section>
    <section class="is-hero-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <h1 class="title">
                Data Barang
            </h1>
            <a href="{{ route('barang.create') }}" class="button light">Tambah Barang</a>
        </div>
    </section>
    <section class="section main-section">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    barang
                </p>
            </header>
            <div class="card-content">
                <table>
                    <thead>
                        <th>ID Barang</th>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th>Merk</th>
                        <th>Harga</th>
                        <th>Opsi</th>
                    </thead>
                    <tbody>
                        @forelse ($Barangs as $barang)
                            <tr>
                                <td>{{ $barang->id_barang }}</td>
                                <td> <img src="{{ asset('/storage/product/' . $barang->image) }}" class="rounded"
                                        style="width: 150px"></td>
                                <td>{{ $barang->nama_produk }}</td>
                                <td>{{ $barang->merk }}</td>
                                <td>{{  "Rp " . number_format($barang->harga, 2, ",", ".")  }}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('barang.destroy', $barang->id_barang) }}" method="POST">
                                        <a href="{{ route('barang.edit', $barang->id_barang) }}" class="button small green --jb-modal" type="button">
                                            <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="button small red --jb-modal" type="submit">
                                            <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <div class="card empty">
                                    <div class="card-content">
                                        <div>
                                            <span class="icon large"><i
                                                    class="mdi mdi-emoticon-sad mdi-48px"></i></span>
                                        </div>
                                        <p>Nothing's here…</p>
                                    </div>
                                </div>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="{{ URL::asset('js/main.min.js') }} "></script>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</body>

</html>
