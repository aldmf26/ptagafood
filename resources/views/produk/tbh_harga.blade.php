<div class="row mt-2" id="tbh_harga{{$count}}">
    <div class="col-lg-4">

        <select name="id_distibusi[]" id="" class="select2">
            <option value="">Pilih distribusi</option>
            <option value="1">Dine in & Takeway</option>
            <option value="2">Gojek</option>
        </select>
    </div>
    <div class="col-lg-3">
        <input name="harga[]" type="text" class="form-control">
    </div>
    <div class="col-lg-2">
        <button type="button" class="btn btn-danger btn-sm remove" count="{{$count}}"><i
                class="fas fa-trash-alt"></i></button>
    </div>

</div>