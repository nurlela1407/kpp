<table class="table table-bordered dataTable-history" cellspacing="0" style="..." id="table-media">
    <thead>
    <tr>
        <td>Date</td>
        <td>Invoice</td>
        <td>Purchase Price</td>

    </tr>
    </thead>
    <tbody>
    @foreach($datas as $data):
        <tr>
        <td>{{ date('d-m-Y', strtotime($data->purchase-order))}}</td>
        <td>{{ $data->purchase->no_invoice }}</td>
        <td>{{ number_format($data->price,0,'.', ',') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<!-- DataTables -->
<script src="{{ asset('asset/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
