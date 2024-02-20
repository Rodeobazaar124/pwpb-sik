@extends('layout')

@section('title')
Ubah {{$barang->name}}
@endsection

@section('body')
    <section class="section main-section">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-plus-box-outline"></i></span>
                    Ubah data barang
                </p>
            </header>
            <div class="card-content">
                <form class="p-4" action="{{ route('barang.update', $barang->id_barang) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="field">
                        <div class="field-body">
                            <div class="flex">
                                <div class="field">
                                    <label for="name">Nama barang</label>
                                    <div class="control icons-left">
                                        <input value="{{old('nama_produk', $barang->nama_produk)}}" id="name" class="input" type="text" placeholder="Nama Barang" name="nama_produk">
                                        <span class="icon left"><i class="mdi mdi-rename-box"></i></span>
                                    </div>
                                </div>
                                <div class="field px-2">
                                    <label for="foto">Foto</label>

                                    <div class="field-body">
                                        <div class="field file">
                                            <label class="upload control">
                                                <a class="button blue" id="foto">
                                                    Upload Foto
                                                </a>
                                                <input type="file" name="image" value="{{old('image', $barang->image)}}">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="merk">Merk</label>
                                <div class="control icons-left">
                                    <input class="input" type="text" placeholder="Merk" name="merk" id="merk" value="{{old('merk', $barang->merk)}}">
                                    <span class="icon left"><i class="mdi mdi-label-outline"></i></span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="harga">Harga</label>

                                <div class="control icons-left">
                                    <input class="input" value="{{old(' harga', $barang->harga)}}" type="number" id="harga" placeholder="Harga" name="harga">
                                    <span class="icon left"><i class="mdi mdi-coins"></i></span>
                                </div>
                            </div>
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
@endsection
