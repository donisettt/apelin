@props(['type' => 'store'])
<div role="alert" {{ $attributes->merge(['class' => 'alert alert-success alert-dismissible fade show']) }}>
    @if ($type == 'delete')
        <strong>Berhasil Dihapus!</strong> data telah dihapus.
    @elseif ($type == 'update')
        <strong>Berhasil Diupdate</strong> data telah diupdate.
    @else
        <strong>Berhasil Disimpan!</strong> data telah disimpan.
    @endif
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
