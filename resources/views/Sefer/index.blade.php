@extends('layouts.app')

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
                 </div>
                 <div class="iq-card-body">
                    <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>. <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it scales with the parent element.</p>
                    <div class="table-responsive">
                       <table id="datatable" class="table table-striped table-bordered" >
                          <thead>
                             <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                             </tr>
                          </thead>
                          <tbody>
                            @foreach ($SeferModel as $project)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->introduction }}</td>
                                <td>{{ $project->location }}</td>
                                <td>{{ $project->cost }}</td>
                                <td>{{ date_format($project->created_at, 'jS M Y') }}</td>
                                <td>
                                    <form action="{{ route('sefer.destroy', $project->id) }}" method="POST">

                                        <a href="{{ route('sefer.show', $project->id) }}" title="show">
                                            <i class="fas fa-eye text-success  fa-lg"></i>
                                        </a>

                                        <a href="{{ route('sefer.edit', $project->id) }}">
                                            <i class="fas fa-edit  fa-lg"></i>

                                        </a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                            <i class="fas fa-trash fa-lg text-danger"></i>

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
    {!! $SeferModel->links() !!}

@endsection
