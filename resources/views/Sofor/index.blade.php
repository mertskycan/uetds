@extends('layouts.app')

@section('content')
    <!-- TOP Nav Bar END -->
    <div class="container-fluid">
        <div class="row">
           <div class="col-sm-12">
              <div class="iq-card">
                 <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                       <h4 class="card-title">Şöför Listesi</h4>
                    </div>
                 </div>
                 <div class="iq-card-body">
                    <p></p>
                    <div class="table-responsive">
                       <table id="datatable" class="table table-striped table-bordered" >
                          <thead>
                            <tr>
                                <th>Firma Adı</th>
                                <th>Sürücü Adı</th>
                                <th>Sürücü Soyadı</th>
                                <th>Telefon</th>
                                <th>E-posta</th>
                                <th>Oluşturulma Tarihi
                                </th>
                                <th></th>
                             </tr>
                          </thead>
                          <tbody>
                            @foreach ($SoforModel as $item)
                            <tr>
                                <td>{{ $item->company->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->surname }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ date_format($item->created_at, 'm/d/Y') }}</td>
                                <td>
                                    <form action="{{ route('sofor.destroy', $item->id) }}" method="POST">

                                        <a href="{{ route('sofor.show', $item->id) }}" title="show">
                                            <i class="ri-eye-fill text-success fa-lg"></i>
                                        </a>

                                        <a href="{{ route('sofor.edit', $item->id) }}">
                                            <i class="ri-pencil-fill  fa-lg"></i>

                                        </a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                            <i class="ri-delete-bin-2-fill  fa-lg text-danger"></i>

                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
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
    {!! $SoforModel->links() !!}

@endsection
