<x-theme.app title="{{ $title }}" table="T">
    <x-slot name="slot">
        @php
            $bulanHuruf = ['bulan', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $bulan = (int) date('m');
        @endphp
        <h3>Absen : <span id="ketbul">{{ $bulanHuruf[$bulan] }}</span> - <span
                id="ketah">{{ date('Y') }}</span>
        </h3>

        @livewire('tbl-absen')
    </x-slot>

</x-theme.app>
