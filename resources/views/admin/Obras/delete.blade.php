<div class="modal fade" id="modalPurple{{$codigo->id}}" tabindex="-1" role="dialog"
    aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModal">Confirmar eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro de que desea eliminar la codigo {{ $codigo->name }} ...?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">Cancelar</button>
                <form style="display:inline" action="{{ route('admin.codigo.destroy', $codigo) }}"
                    method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    {!! $btnDelete !!}
                </form>
            </div>
        </div>
    </div>
</div>