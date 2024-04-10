<x-adminlte-modal id="editModal{{ $obra->id }}" title="Editar el Tipo de Obra" size="lg" theme="primary"
    icon="fas fa-bell" v-centered static-backdrop scrollable>
    <div style="height:200px;">
        <p>Ingrese Informacion</p>
        <form action="{{ route('admin.tipobras.update', $obra) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <x-adminlte-input type="text" name="name" label="Nombre del obra" label-class="text-lightblue"
                        value="{{ $obra->name }}" AutoSize>
                        <x-slot name="prependSlot">
                            <div class="input-group-text">
                                <i class="fa fa-user-circle text-lightblue car-sport-outline"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-input>
                    <x-adminlte-button type="submit" label="Actualizar" theme="primary" icon="fas fa-save" />
                </div>
            </div>
        </form>
    </div>
    <x-slot name="footerSlot">
    </x-slot>
</x-adminlte-modal>
