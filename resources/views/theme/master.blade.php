<x-theme.app title="{{$title}}" table="Y">
    <x-slot name="cardHeader">
        <x-theme.button modal="T" idModal="tambahModal" href="{{ route('dashboard') }}" id="tambah" icon="fa-plus"
            addClass="float-end" teks="aldi" size="sm" />
        <x-theme.modal idModal="tambahModal" title="tambah user" btnSave="Y" size="modal-lg" />
    </x-slot>

    <x-slot name="cardBody">
        <section class="row">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Aldi</td>
                    </tr>
                </tbody>
            </table>
        </section>

    </x-slot>

</x-theme.app>
