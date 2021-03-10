<table class="table table-bordered dataTable-purchase-product" cellspacing="0" style="..." id="table-media-{{ $id_count }}">
    <thead>
    <tr>
        <td>ID</td>
        <td>Code</td>
        <td>Name</td>
        <td>Price</td>

    </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<!-- DataTables -->
<script src="{{ asset('asset/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

<script>
    $('#table-media-{{$id_count}}').on('click', 'tbody tr', function (e){
        e.preventDefault();

        $('#id_raw_product {{$id_count}}').val($(this).find('td').html());
        $('#name_raw_product {{$id_count}}').val($(this).find('td').next().next().html());
        $('#price {{$id_count}}').val($(this).find('td').next().next().next().html());

    });

    $('.dataTable-purchase-product').DataTable({
        processing:true,
        serverSide:true,
        ajax:"{{route('browse-product/datatable')}}",
        columns:[
            {data:'id', name:'id'},
            {data:'elektronika_id', name:'elektronika_id'},
            {data:'nama', name:'nama'},
            {data:'harga', name:'harga'},
        ],
        responsive:true

    });

    $('#table-media-{{$id_count}}').on('click', 'tbody tr', function (e){
        $('#modal-default').model('hide');
    })
    </script>