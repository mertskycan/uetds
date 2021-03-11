@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12 col-lg-12">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Plaka Düzenle</h4>
                </div>
             </div>
             <div class="iq-card-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis mollis, diam nibh finibus leo</p>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('plaka.update', $plakaModel->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group form-row">
                   <div class="col">
                       <label for="name">Plaka</label>
                      <input type="text" class="form-control"  value="{{ $plakaModel->plate }}"  id="plate" name="plate" placeholder=" ">
                   </div>
                   <div class="col">
                    <label for="company_id">Firma</label>

                    <select class="form-control" id="company_id"name="company_id" >
                       <option selected="" disabled="">Firma Seçiniz</option>
                       @php( $companys = \App\CompanyModel::get())
                        @foreach ($companys as $item)
                        <option value="{{ $item->id }}"@if ($item->id ==  $plakaModel->company->id)
                            selected
                        @endif>{{ $item->name }}</option>
                        @endforeach
                    </select>
                   </div>
                </div>





                      <input type="hidden" value="{{ Auth::user()->id }}" class="form-control"  id="created_user_id" name="created_user_id" >

                   <button type="submit" class="btn btn-primary">Kaydet </button>
                   <button type="submit" class="btn iq-bg-danger">Cancel</button>
                </form>
             </div>
          </div>

        </div>
    </div>
</div>

@endsection
