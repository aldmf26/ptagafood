<x-theme.app title="{{ $title }}" table="Y" sizeCard="12">
    <x-slot name="cardHeader">
        <x-theme.button modal="Y" idModal="tambah" icon="fa-plus" addClass="float-end" teks="Tambah" />
        <x-theme.modal idModal="tambah" title="Tambah Product" btnSave="Y" size="modal-lg-max">
            <div class="row">
                <div class="col-lg-4">
                    <div class="holder mb-2">
                        <img id="imgPreview" src="/img/choose.png" alt="pic" width="100%" height="200px" />
                    </div>

                    <fieldset>
                        <div class="input-group mb-3">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="photo"><i class="bi bi-upload"></i></label>
                                <input type="file" class="form-control" id="photo">
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
                            <input type="text" class="form-control" name="produk">
                        </div>
                        <div class="col-lg-2">
                            <label for="">Jenis</label>
                            <select name="" id="" class="select2">
                                <option value="">Pilih Jenis</option>
                                <option value="">Food</option>
                                <option value="">Drink</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </x-theme.modal>
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
                                $("#imgPreview")
                                  .attr("src", event.target.result);
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                });
    </script>
    @endsection
</x-theme.app>