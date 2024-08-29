<form method="POST" action="{{ route('transaksi.update', ['transaksi' => $transaksi->id]) }}"
    class="card-body border-top">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Tanggal</label>
                <span class="col"> : {{ date('d/m/Y H:i:s', strtotime($transaksi->tgl)) }}</span>
            </div>
            <div class="form-group">
                <label>Batas Waktu</label>
                <span> : {{ date('d/m/Y H:i:s', strtotime($transaksi->batas_waktu)) }}</span>
            </div>
            <div class="form-group">
                <label>Status</label>
                <span> : {{ ucwords($transaksi->status) }}</span>
            </div>
            <div class="form-group">
                <label>Status Bayar</label>
                <span> : {{ ucwords(str_replace('-', ' ', $transaksi->dibayar)) }}</span>
            </div>
        </div>
        <div class="col-2"></div>
        <div class="col">
            <div class="form-group row">
                <label class="col">Total</label>
                <div class="col">
                    <x-input-transaksi name="total" id="total" :value="$transaksi->sub_total" disabled />
                </div>
            </div>
            <div class="form-group row">
                <label class="col">Diskon (Optional)</label>
                <div class="col">
                    <x-input-transaksi id="diskon" name="diskon" :value="$transaksi->diskon" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col">Biaya Tambahan (Optional)</label>
                <div class="col">
                    <x-input-transaksi id="biaya_tambahan" name="biaya_tambahan" :value="$transaksi->biaya_tambahan" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col">Pajak (10%)</label>
                <div class="col">
                    <x-input-transaksi name="pajak" id="pajak" :value="$transaksi->pajak" disabled />
                </div>
            </div>
            <div class="form-group row">
                <label class="col">Total Bayar</label>
                <div class="col">
                    <x-input-transaksi id="total_bayar" :value="$transaksi->total_bayar" name="total_bayar" disabled />
                </div>
            </div>
            <div class="form-group row">
                <label class="col">Uang Tunai / Cash (Optional)</label>
                <div class="co">
                    <div class="col">
                        <x-input-transaksi name="uang_tunai" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col form-inline">
                        <a href="{{ route('transaksi.index') }}" class="btn btn-default mr-2">Kembali</a>
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">
                                Pilih Status Menjadi
                            </button>
                            <div class="dropdown-menu">
                                <?php
                                $status = [['Proses', 'proses'], ['Selesai', 'selesai'], ['Diambil', 'diambil']];
                                ?>
                                @foreach ($status as $row)
                                    <a class="dropdown-item"
                                        href="{{ route('transaksi.status', ['transaksi' => $transaksi->id, 'status' => $row[1]]) }}">
                                        {{ $row[0] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-database mr-2"></i> Update Pembayaran
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@push('js')
    <script>
        $('#diskon, #biaya_tambahan').keyup(function() {
            let t = parseInt($('#total').val());
            let d = parseInt($('#diskon').val());
            let bt = parseInt($('#biaya_tambahan').val());
            d = isNan(d) ? 0 : d;
            bt = isNan(bt) ? 0 : bt;
            let total = t - d + bt;
            let pajak = Math.round(total * 10 / 100);
            $("#pajak").val(pajak);
            $("#total_bayar").val(total + pajak);
        })
    </script>
@endpush
