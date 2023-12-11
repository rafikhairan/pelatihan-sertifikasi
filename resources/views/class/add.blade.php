@extends('layout.app')

@section('content')
<!-- Content -->
<h2>Create Class</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Class</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Class</li>
    </ol>
</nav>

<div class="row">
    <div class="col-lg-6">
        <div class="card rounded-0 shadow-sm mb-4">
            <div class="card-header bg-white pt-3">
                <h6>Buat Grup Kelas</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group mb-3">
                        <label class="form-label" for="group">Grup Kelas</label>
                        <p class="text-danger">
                            <small>Grup kelas dapat mempermudah pengelompokan kelas berdasarkan tingkatan kelas dan jenis peminatan kelas. 
                                Penamaan grup kelas cukup ditulis dengan angka tingkatan kelas seperti 8 atau angka tingkatan beserta jenis peminatan 
                                kelas seperti 12 MIPA. 
                            </small>
                        </p>
                        <input id="group" class="form-control" type="text" name="group" placeholder="Contoh: XII IPS">
                    </div>
                    <button class="btn btn-success rounded-0 w-100 py-2">Simpan</button> 
                </form>
            </div>
        </div>
        <div class="card rounded-0 shadow-sm mb-4">
            <div class="card-header bg-white pt-3">
                <h6>Tambah Wali Kelas</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group mb-3">
                        <label class="form-label" for="wclass">Kelas</label>
                        <select id="wclass" class="form-select" type="text" name="class">
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="teacher">Wali Kelas</label>
                        <select id="teacher" class="form-select" type="text" name="teacher">
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <button class="btn btn-success rounded-0 w-100 py-2">Simpan</button> 
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card rounded-0 shadow-sm mb-4">
            <div class="card-header bg-white pt-3">
                <h6>Buat Kelas</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group mb-3">
                        <label class="form-label" for="classgroup">Grup Kelas</label>
                        <select id="classgroup" class="form-select" type="text" name="group">
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="class">Nama Kelas</label>
                        <p class="text-danger">
                            <small>Penamaan kelas bisa menggunakan abjad atau angka.</small>
                        </p>
                        <input id="class" class="form-control" type="text" name="class" placeholder="Contoh: XII-MIPA-1 atau 8.A">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="room">Ruangan</label>
                        <input id="room" class="form-control" type="text" name="room">
                    </div>
                    <button class="btn btn-success rounded-0 w-100 py-2">Simpan</button> 
                </form>
            </div>
        </div>
    </div>
</div>

@endsection