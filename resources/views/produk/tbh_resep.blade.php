<div class="row mt-2" id="tbh_resep{{$count}}">
    <div class="col-lg-4">

        <select name="id_bahan[]" id="" class="select2 bhn_baku">
            <option value="">Pilih Bahan Baku</option>
            <option value="1">Wagyu A5</option>
            <option value="2">Bawang Merah</option>
            <option value="3">Kecap</option>
        </select>
    </div>
    <div class="col-lg-2">

        <input name="qty_resep[]" type="text" class="form-control">
    </div>
    <div class="col-lg-2">

        <select name="id_satuan_resep[]" id="" class="select2 bhn_baku">
            <option value="">Pilih Satuan</option>
            <option value="1">Pcs</option>
            <option value="2">Gr</option>
        </select>
    </div>
    <div class="col-lg-2">
        <button type="button" class="btn btn-danger btn-sm remove_resep bhn_baku" count="{{$count}}"><i
                class="fas fa-trash-alt"></i></button>
    </div>

</div>