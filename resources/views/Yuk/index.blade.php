@extends('layouts.app')

@section('css')
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

@endsection
@section('content')
    <!-- TOP Nav Bar END -->
    <div class="container-fluid">
        <div class="row">
           <div class="col-sm-12">
              <div class="iq-card">
                 <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                       <h4 class="card-title">Bootstrap Datatables</h4>
                    </div>
                    <form action="{{route('excel.yuk')}}" id="excel" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <input id='fileid' type='file' name="excelss" hidden/>
                    <input id='buttonid' type='button' value='Excel Dosya Yükle' />
                </form>
                 </div>
                 <div class="iq-card-body">
                    <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>. <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it scales with the parent element.</p>
                    <div class="table-responsive">
                       <table id="datatable" class="table table-striped table-bordered yajra-datatable">
                          <thead>
                             <tr>
                                <th>No #</th>
                                <th>Kayıt Tarihi</th>
                                <th>Başlangıç Tarihi</th>
                                <th>Bitiş Tarihi</th>
                                <th>Şöför</th>
                                <th>Plaka</th>
                                <th>Durum</th>
                                <th>İşlem</th>
                             </tr>
                          </thead>
                          <tbody>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

</tfoot>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
    {!! $SeferModel->links() !!}

@endsection
@section('script')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
document.getElementById('buttonid').addEventListener('click', openDialog);

    function openDialog() {
      document.getElementById('fileid').click();
    }
                document.getElementById('fileid').addEventListener('change', submitForm);
                function submitForm() {
                    document.getElementById('excel').submit();
                }
    $(function () {
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
      var table = $('.yajra-datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('yuk.list') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'create', name: 'create'},
              {data: 'sDate', name: 'sDate'},
              {data: 'eDate', name: 'eDate'},
              {data: 'sofor', name: 'sofor'},
              {data: 'plaka', name: 'plaka'},
              {data: 'status_code', name: 'status_code'},
              {
                  data: 'action',
                  name: 'action',
                  orderable: true,
                  searchable: true
              },
          ]
      });

    });
  </script>
@endsection
