@extends('layouts.main', ['title' => 'Transaksi'])
@section('content')
    <x-content :title="[
        'name' => 'Transaksi',
        'icon' => 'fas fa-cash-register',
    ]">
        @if (session('message') == 'success update')
            <x-alert-success type="update" />
        @endif

        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <div class="form-group">Nama Member : {{ $member->nama }}</div>
                        <div class="form-group">No Telepon : {{ $member->tlp }}</div>
                        <div class="form-group">Alamat : {{ $member->alamat }}</div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col">
                        <div class="form-group">Outlet : {{ $outlet->nama }}</div>
                        <div class="form-group">Kasir : {{ $user->nama }}</div>
                        <div class="form-group">
                            <a href="{{ route('transaksi.invoice', ['transaksi' => $transaksi->id]) }}" target="_blank"
                                class="btn btn-primary"><i class="fas fa-print"></i>
                                Cetak Invoice
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover m-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>QTY</th>
                            <th>Sub Total</th>
                            <th>keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->nama_paket }}</td>
                                <td>
                                    {{ $item->qty }} x {{ number_format($item->harga, 0, ',', '.') }}
                                </td>
                                <td>
                                    {{ number_format($item->qty * $item->harga, 0, ',', '.') }}
                                </td>
                                <td>{{ $item->keterangan }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada paket yang dipilih.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($transaksi->dibayar == 'belum_dibayar')
                @include('transaksi.detail-form', ['transaksi' => $transaksi])
            @else
                @include('transaksi.detail-cash', ['transaksi' => $transaksi])
            @endif
        </div>
    </x-content>
@endsection
