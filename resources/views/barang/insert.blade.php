@extends('layout')

@section('title')
Tambah barang
@endsection

@section('body')
    <section class="section main-section">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-plus-box-outline"></i></span>
                    Tambah Data Barang
                </p>
            </header>
            <div class="card-content">
                <form class="p-4" action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="field">
                        <div class="field-body">
                            <div class="flex">
                                <div class="field">
                                    <label for="name">Nama barang</label>
                                    <div class="control icons-left">
                                        <input id="name" class="input" type="text" placeholder="Nama Barang" name="nama_produk">
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
                                                <input type="file" name="image">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="merk">Merk</label>

                                <div class="control icons-left">
                                    <input class="input" type="text" placeholder="Merk" name="merk" id="merk">
                                    <span class="icon left"><i class="mdi mdi-label-outline"></i></span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="harga">Harga</label>

                                <div class="control icons-left">
                                    <input class="input" type="number" id="harga" placeholder="Harga" name="harga">
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
