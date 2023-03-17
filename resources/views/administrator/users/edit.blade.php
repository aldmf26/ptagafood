<div class="row">
    <input type="hidden" name="id_user" value="{{ $user->id }}">
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" value="{{ $user->name }}" name="nama" class="form-control">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Posisi</label>
            <select name="id_posisi" class="form-control" id="">
                <option value="">- Pilih Posisi -</option>
                @foreach ($posisi as $p)
                    <option {{ $user->id_posisi == $p->id ? 'selected' : '' }} value="{{ $p->id }}">{{ $p->nm_posisi }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Username</label>
            <input value="{{ $user->username }}" type="text" name="username" class="form-control">
        </div>
    </div>
</div>