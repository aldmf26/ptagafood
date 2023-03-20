<x-theme.app title="{{ $title }}" table="Y" sizeCard="12">
    <x-slot name="cardHeader">
        <x-theme.button modal="Y" idModal="tambah" icon="fa-plus" addClass="float-end" teks="Tambah" />

        <form action="{{route('produk')}}" enctype="multipart/form-data" method="post">
            @csrf
            <x-theme.modal idModal="tambah" title="Tambah Product" btnSave="Y" size="modal-lg-max">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="holder mb-2">
                            <img id="imgPreview" src="/img/download.png" alt="pic" width="100%" height="200px" />
                        </div>

                        <fieldset>
                            <div class="input-group mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="photo"><i class="bi bi-upload"></i></label>
                                    <input type="file" name="image" class="form-control" id="photo">
                                </div>
                            </div>

                        </fieldset>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="">Sku</label>
                                <input type="text" class="form-control" name="sku">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Nama Produk</label>
                                <input type="text" class="form-control" name="nm_produk">
                            </div>
                            <div class="col-lg-3">
                                <label for="">Type</label>
                                <select name="id_type" id="" class="select2">
                                    <option value="">Pilih Jenis</option>
                                    <option value="">Food</option>
                                    <option value="">Drink</option>
                                </select>
                            </div>
                            <div class="col-lg-4 mt-2">
                                <label for="">Kategori Product</label>
                                <select name="id_kategori" id="" class="select2">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $k)
                                    <option value="{{$k->id_kategori_products}}">{{$k->nm_kategori_product}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 mt-2">
                                <label for="">Level Point</label>
                                <select name="id_point" id="" class="select2">
                                    <option value="">Pilih Point</option>
                                    @foreach ($point as $p)
                                    <option value="{{$p->id_point}}">{{$p->nm_point}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 mt-2">
                                <label for="">Station</label>
                                <select name="id_station" id="" class="select2">
                                    <option value="">Pilih Station</option>
                                    @foreach ($station as $s)
                                    <option value="{{$s->id_station}}">{{$s->nm_station}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Harga</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Stok</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">Resep</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="">Distribusi</label>
                                        <select name="id_distibusi[]" id="" class="select2">
                                            <option value="">Pilih distribusi</option>
                                            <option value="1">Dine in & Takeway</option>
                                            <option value="2">Gojek</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Harga</label>
                                        <input name="harga[]" type="text" class="form-control">
                                    </div>

                                </div>
                                <div id="hrga_distribusi"></div>
                                <div class="row">
                                    <div class="col-12 mt-4">
                                        <button id="tbh_hrga_distribusi" class="btn btn-block btn-lg" type="button"
                                            style="background-color: #F4F7F9; color: #8FA8BD; font-size: 14px; padding: 13px;"><i
                                                class="fas fa-plus"></i> Tambah</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                aria-labelledby="pills-profile-tab">
                                <div class="row">
                                    <div class="col-lg-9 mb-2 pesan_resep">
                                        <div class="alert alert-light-danger color-danger">
                                            <i class="bi bi-exclamation-circle"></i> Resep hanya berlaku untuk produk
                                            dengan <span class="fw-bold"> Monitoring persediaan OFF </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Bahan Baku</label>
                                        <select name="id_bahan[]" id="" class="select2 bhn_baku">
                                            <option value="">Pilih Bahan Baku</option>
                                            <option value="1">Wagyu A5</option>
                                            <option value="2">Bawang Merah</option>
                                            <option value="3">Kecap</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Quantity</label>
                                        <input name="qty_resep[]" type="text" class="form-control bhn_baku">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Satuan Resep</label>
                                        <select name="id_satuan_resep[]" id="" class="select2 bhn_baku">
                                            <option value="">Pilih Satuan</option>
                                            <option value="1">Pcs</option>
                                            <option value="2">Gr</option>
                                        </select>
                                    </div>

                                </div>
                                <div id="tbh_resep"></div>
                                <div class="row">
                                    <div class="col-12 mt-4">
                                        <button class="btn btn-block btn-lg bhn_baku" id="btn_tbh_resep" type="button"
                                            style="background-color: #F4F7F9; color: #8FA8BD; font-size: 14px; padding: 13px;"><i
                                                class="fas fa-plus"></i> Tambah Bahan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <table class="table">
                                            <td wdith="10%"> <i class="fas fa-cog"></i></td>
                                            <td wdith="10%">Monitor Persediaan</td>
                                            <td align="left">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input monitor" name="monitor" value="Y"
                                                        type="checkbox" id="flexSwitchCheckDefault" />
                                                </div>
                                            </td>
                                        </table>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="">Stok Awal</label>
                                        <input type="text" name="stk_awal" class="form-control">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="">Satuan</label>
                                        <select name="satuan_stk" id="" class="select2">
                                            <option value="">Pilih Satuan</option>
                                            <option value="">Pcs</option>
                                            <option value="">Gr</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-theme.modal>
        </form>
    </x-slot>

    <x-slot name="cardBody">
        <section class="row">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>SKU</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $no => $d)
                    <tr>
                        <td>{{ $no + 1 }}</td>
                        <td>{{ $d->sku }}</td>
                        <td>{{ $d->nm_product }}</td>
                        <td>{{ $d->kategori->nm_kategori_product }}</td>
                        <td>
                            @php
                            $harga = DB::table('harga')->where('id_products',$d->id_product)->get();
                            @endphp
                            @foreach ($harga as $h)

                            {{$h->id_distribusi == '1' ? 'Dine in' : 'Gojek'}} : {{number_format($h->harga,0)}} <br>


                            @endforeach
                        </td>
                        <td>
                            <x-theme.button modal="Y" idModal="tambahModal" icon="fa-pen" addClass="me-1 float-start"
                                teks="" />
                            <x-theme.button modal="Y" idModal="tambahModal" icon="fa-trash" addClass="float-start"
                                teks="" variant="danger" />
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

    </x-slot>
    @section('scripts')
    <script>
        $(document).ready(() => {
            $("#photo").change(function () {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $("#imgPreview").attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            var count = 1;
            $(document).on('click', '#tbh_hrga_distribusi', function() {
                count = count + 1;
                $.ajax({
                    url: "{{ route('tambah_harga') }}?count=" + count,
                    type: "Get",
                    success: function(data) {
                        $('#hrga_distribusi').append(data);
                        $(".select2").select2({
                            dropdownParent: $('#tambah .modal-content')
                        });
                    }
                });
            });

            var count = 1;
            $(document).on('click', '#btn_tbh_resep', function() {
                count = count + 1;
                $.ajax({
                    url: "{{ route('tambah_resep') }}?count=" + count,
                    type: "Get",
                    success: function(data) {
                        $('#tbh_resep').append(data);
                        $(".select2").select2({
                            dropdownParent: $('#tambah .modal-content')
                        });
                    }
                });
            });

            $('.pesan_resep').hide()
            $(document).on('click', '.monitor', function() {
                if($(this).prop("checked") == true){
                    $('.bhn_baku').attr('disabled', 'true');
                    $('.pesan_resep').show()
                }
                else if($(this).prop("checked") == false){
                    $('.bhn_baku').removeAttr('disabled');
                    $('.pesan_resep').hide()
                }
                
            });
            $(document).on('click', '.remove', function() {
                var delete_row = $(this).attr('count');
                $('#tbh_harga' + delete_row).remove();
            });
            $(document).on('click', '.remove_resep', function() {
                var delete_row = $(this).attr('count');
                $('#tbh_resep' + delete_row).remove();
            });
        });
    </script>
    @endsection
</x-theme.app>