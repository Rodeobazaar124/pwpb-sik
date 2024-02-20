@extends('layout')

@section('body')

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Dashboard</li>
    </ul>
  </div>
</section>

  <section class="section main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-plus-box-outline"></i></span>
          Tambah Data Transaksi
        </p>

      </header>
      <div class="card-content">
      <form action="{{ route('transaksi.update', $Transaksis->id_transaksi) }}" method="POST" class="p-4">
        @csrf
        @method('PATCH')
          <div class="field">
            <div class="field-body">
              <div class="field">
                <!-- <div class="control icons-left">
                  <input class="input" type="text" placeholder="Merk" name="merk" >
                  <span class="icon left"><i class="mdi mdi-label-outline"></i></span>
                </div> -->
                <label for="barang">Barang</label>
                <select name="barang" id="barang" class="input" onchange='updateInput(document.getElementById("barang").value)'>
                    <option value="">-- Barang --</option>
                        @foreach ($Barangs as $barang)
                          <option value="{{ $barang->id_barang }}" {{ $Transaksis->id_barang === $barang->id_barang ? 'selected' : '' }}>
                            {{ $barang->nama_produk }}
                          </option>
                        @endforeach
                      </select>
                </select>
              </div>
              <label for="harga">Harga Barang</label>
              <div class="field">
                <div class="control icons-left">

                  <input class="input" type="number" placeholder="Harga" name="harga" id="harga" value="{{$Transaksis->barang->harga}}" readonly>
                  <span class="icon left"><i class="mdi mdi-coins"></i></span>
                </div>
              </div>

              <label for="qty">Total Item</label>
              <div class="field">
                <div class="control icons-left">
                  <input class="input" value="{{$Transaksis->total_item}}" type="number" placeholder="Total Item" name="total_item" id='qty' onchange='updatetHarga(document.getElementById("harga").value)' type="number" placeholder="Qty" value='1'>
                  <span class="icon left"><i class="mdi mdi-coins"></i></span>
                </div>
              </div>

              <label for="tharga">Total Harga</label>
              <div class="field">
                <div class="control icons-left">
                  <input class="input" type="readonly" value="{{$Transaksis->total_harga}}" placeholder="Total Harga" id='tharga' value='' name="total_harga" readonly>
                  <span class="icon left"><i class="mdi mdi-coins"></i></span>
                </div>
              </div>
              <label for="status">Status pembayaran</label>
              <select name="status_pembayaran" value="{{$Transaksis->status_pembayaran}}" class="input" id="status">
                    <option value="">-- Status Pembayaran --</option>
                    <option value="selesai" {{$Transaksis->status_pembayaran === 'selesai' ? 'selected' : ''}}>Selesai</option>
                    <option value="belum selesai" {{$Transaksis->status_pembayaran === 'belum selesai' ? 'selected' : ''}}>Belum Selesai</option>
                      </select>
                </select>

            </div>
          </div>
          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button green">
                Submit
              </button>
            </div>
            <div class="control">
              <button type="reset" class="button red">
                Reset
              </button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </section>
  <script type="text/javascript" src="{{ URL::asset('js/main.min.js'); }} "></script>
  <script>
        function updatetHarga(input){
            document.getElementById("tharga").value=input*document.getElementById("qty").value;
        }
        function updateInput(input){
            var barang = @json($Barangs);
            for (let i = 0; i< barang.length;i++){
                if (barang[i].id_barang == input) {
                    document.getElementById("harga").value=barang[i].harga;
                    updatetHarga(document.getElementById("harga").value=barang[i].harga);
                }
            }
        }
    </script>
@endsection
