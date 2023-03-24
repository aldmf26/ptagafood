<x-theme.app title="{{ $title }}" table="Y" sizeCard="12">
    <x-slot name="cardHeader">
        <x-theme.button modal="Y" idModal="tambah" icon="fa-plus" addClass="float-end" teks="Tambah" />
    </x-slot>

    <x-slot name="cardBody">
        <section class="row">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                        <th>Posisi</th>
                        @if (auth()->user()->posisi->id == 1)
                            <th>Rp M</th>
                            <th>Rp E</th>
                            <th>Rp SP</th>
                            <th>Rp Bulanan</th>
                        @endif
                        <th>Point</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawans as $no => $k)
                        @php
                            $totalKerja = new DateTime($k->tgl_masuk);
                            $today = new DateTime();
                            $tKerja = $today->diff($totalKerja);
                        @endphp
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $k->nm_karyawan }}</td>
                            <td>{{ date('d-m-Y', strtotime($k->tgl_masuk)) }} ({{ $tKerja->y }} Tahun)</td>
                            <td>{{ $k->status->nm_status }}</td>
                            <td>{{ $k->posisi->nm_posisi }}</td>
                            @if (auth()->user()->posisi->id == 1)
                                <td>{{ number_format($k->gaji->rp_m, 0) }}</td>
                                <td>{{ number_format($k->gaji->rp_e, 0) }}</td>
                                <td>{{ number_format($k->gaji->rp_sp, 0) }}</td>
                                <td>{{ number_format($k->gaji->g_bulanan, 0) }}</td>
                            @endif
                            @if ($k->point == 'T')
                                <td><a href="{{ route('karyawan.point', ['value' => 'Y', 'id_karyawan' => $k->id]) }}"
                                        class="btn btn-danger btn-sm"><i class="fas fa-times-circle"></i></a></td>
                            @else
                                <td><a href="{{ route('karyawan.point', ['value' => 'T', 'id_karyawan' => $k->id]) }}"
                                        class="btn btn-success btn-sm"><i class="fas fa-check-circle"></i></a></td>
                            @endif
                            <td>
                                <x-theme.button hapus="Y" href="{{ route('karyawan.delete', $k->id) }}"
                                    icon="fa-trash" addClass="float-end" teks="" variant="danger" />
                                <x-theme.button modal="Y" idModal="edit-modal" icon="fa-pen"
                                    addClass="me-1 float-end edit-btn" teks=""
                                    data="url={{ route('karyawan.edit', $k->id) }}" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        {{-- ALL MODAL --}}
        <form action="{{ route('karyawan.create') }}" method="post">
            @csrf
            <x-theme.modal idModal="tambah" title="tambah karyawan" btnSave="Y" size="modal-lg">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Tgl</label>
                            <input type="date" name="tgl_masuk" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="id_status" class="form-control" id="">
                                <option value="">- Pilih Status -</option>
                                @foreach ($status as $p)
                                    <option value="{{ $p->id }}">{{ $p->nm_status }}</option>
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
                                    <option value="{{ $p->id }}">{{ $p->nm_posisi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">Rp M</label>
                            <input type="text" name="rp_m" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">Rp E</label>
                            <input type="text" name="rp_e" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">Rp SP</label>
                            <input type="text" name="rp_sp" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="">G Bulanan</label>
                            <input type="text" name="g_bulanan" class="form-control">
                        </div>
                    </div>

                </div>
            </x-theme.modal>
        </form>

        <form action="{{ route('karyawan.update') }}" method="post">
            @csrf
            <x-theme.modal idModal="edit-modal" title="tambah Karyawan" btnSave="Y" size="modal-lg">
                <div id="edit-modal-body"></div>

            </x-theme.modal>
        </form>

    </x-slot>

    @section('scripts')
        <script>
            $(document).ready(function() {
                $(document).on('click', '.edit-btn', function() {
                    var url = $(this).attr('url')
                    $.ajax({
                        type: "GET",
                        url: url,
                        success: function(response) {
                            $('#edit-modal-body').html(response);
                        }
                    });

                })
            });
        </script>
    @endsection
</x-theme.app>
