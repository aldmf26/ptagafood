<x-theme.app title="{{ $title }}" table="Y" sizeCard="8">
    <x-slot name="cardHeader">
        <x-theme.button modal="Y" idModal="tambahModal" icon="fa-plus" addClass="float-end" teks="Tambah" />
        <x-theme.modal idModal="tambahModal" title="tambah user" btnSave="Y" size="modal-lg">
            
        </x-theme.modal>
    </x-slot>

    <x-slot name="cardBody">
        <section class="row">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th width="5">#</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $no => $d)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ ucwords($d->name) }}</td>
                                <td>{{ ucwords($d->posisi->nm_posisi) }}</td>
                                <td>
                                    <x-theme.button modal="Y" idModal="tambahModal" icon="fa-trash"
                                        addClass="float-end" teks="" variant="danger" />
                                    <x-theme.button modal="Y" idModal="tambahModal" icon="fa-pen" addClass="me-1 float-end"
                                        teks="" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </section>

    </x-slot>

</x-theme.app>
