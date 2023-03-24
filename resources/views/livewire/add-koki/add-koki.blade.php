<div x-data="{
    confirmDelete(id) {
        if(confirm('Yakin dihapus ?')) {
            $wire.delete(id)
        } else {
            console.log('tidak')
        }
    }
}">
    
    <form wire:submit.prevent="saveKoki" id="saveKoki">
        <div wire:ignore class="row mb-5">
            <div class="col-lg-6">
                <label for="taskSelect" class="form-label">Select Tasks</label>
                <select class="form-select" id="taskSelect" multiple="multiple">
                    @foreach ($tasks as $task)
                        <option id="{{ $task->id }}">{{ $task->id }}-{{ $task->nm_karyawan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-3">
                <label for="">Aksi</label>
                <button class="btn btn-sm btn-primary btn-block mt-2">Simpan</button>
            </div>
        </div>
    </form>

    <table class="table" id="">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($koki as $no => $n)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $n->karyawan->nm_karyawan }}</td>
                    <td>
                        <button @click="confirmDelete({{$n->id_koki}})" type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @section('scripts')
        <script>

            $(document).ready(function() {
                $('#taskSelect').select2();

                

                $('#taskSelect').on('change', function(e) {
                    @this.set('selectedTasks', $(this).val());
                });
            });
        </script>
    @endsection
</div>
