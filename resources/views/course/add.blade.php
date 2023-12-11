@extends('layout.app')

@section('content')
<!-- Content -->
<h2>Add Course</h2>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Course</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Course</li>
    </ol>
</nav>

<div class="row">
    <div class="col-lg-6">
        <div class="card rounded-0 shadow-sm mb-4">
            <div class="card-header bg-white pt-3">
                <h6>Tambah Mata Pelajaran</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group mb-3">
                        <label class="form-label" for="course">Mata Pelajaran</label>
                        <input id="course" class="form-control" type="text" name="course" placeholder="Contoh: Matematika Kelas 1">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="type">Jenis Mata Pelajaran</label>
                        <select id="type" class="form-select" type="text" name="type">
                            <option value="">Umum</option>
                            <option value="">Peminatan</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="type">Grup Kelas</label>
                        <select id="type" class="form-select" type="text" name="type">
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
                <h6>Tambah Guru Mata Pelajaran</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group mb-3">
                        <label class="form-label" for="teacher">Guru</label>
                        <select id="teacher" class="form-select" type="text" name="teacher">
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="course">Mata Pelajaran</label>
                        <select id="course" class="form-select" type="text" name="course">
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="group">Grup Kelas</label>
                        <select id="group" class="form-select" type="text" name="group">
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="class">Kelas</label>
                        <select id="class" class="form-select" type="text" name="class">
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <button class="btn btn-success rounded-0 w-100 py-2">Simpan</button> 
                </form>
            </div>
        </div>
    </div>
</div>

@endsection