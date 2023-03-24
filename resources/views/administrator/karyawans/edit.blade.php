<div class="row">
    <input type="hidden" name="id_karyawan" value="{{ $karyawan->id }}">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Tgl</label>
            <input type="date" value="{{ $karyawan->tgl_masuk }}" name="tgl_masuk" class="form-control">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" value="{{ $karyawan->nm_karyawan }}" name="nama" class="form-control">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Status</label>
            <select name="id_status" class="form-control" id="">
                <option value="">- Pilih Status -</option>
                @foreach ($status as $p)
                    <option {{$p->id == $karyawan->id_status ? 'selected' : ''}} value="{{ $p->id }}">{{ $p->nm_status }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Posisi</label>
            <select name="id_posisi" class="form-control" id="">
                <option value="">- Pilih Posisi -</option>
                @foreach ($posisi as $p)
                    <option {{$p->id == $karyawan->id_posisi ? 'selected' : ''}} value="{{ $p->id }}">{{ $p->nm_posisi }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label for="">Rp M</label>
            <input type="text" value="{{ $karyawan->gaji->rp_m }}" name="rp_m" class="form-control">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label for="">Rp E</label>
            <input type="text" value="{{ $karyawan->gaji->rp_e }}" name="rp_e" class="form-control">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label for="">Rp SP</label>
            <input type="text" value="{{ $karyawan->gaji->rp_sp }}" name="rp_sp" class="form-control">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label for="">G Bulanan</label>
            <input type="text" value="{{ $karyawan->gaji->g_bulanan }}" name="g_bulanan" class="form-control">
        </div>
    </div>
    
</div>