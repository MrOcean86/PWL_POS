@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @empty($level)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan.
                </div>
                <a href="{{ url('level') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form method="POST" action="{{ url('/level/'.$level->level_id) }}" class="form-horizontal">
                    @csrf
                    @method('PUT') <div class="form-group row">
                        <label class="col-2 control-label col-form-label">ID Level</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="level_id" name="level_id" value="{{ $level->level_id }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label">Kode Level</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="level_kode" name="level_kode" value="{{ old('level_kode', $level->level_kode) }}" required>
                            @error('level_kode')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label">Nama Level</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="level_nama" name="level_nama" value="{{ old('level_nama', $level->level_nama) }}" required>
                            @error('level_nama')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 control-label col-form-label"></label>
                        <div class="col-10">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a class="btn btn-sm btn-default ml-1" href="{{ url('level') }}">Kembali</a>
                        </div>
                    </div>
                </form>
            @endempty
        </div>
    </div>
@endsection