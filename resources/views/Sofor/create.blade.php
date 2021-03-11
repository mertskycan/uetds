@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12 col-lg-12">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Sürücü Oluştur</h4>
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
            <form action="{{ route('sofor.store') }}" method="POST" >
                @csrf
                <div class="form-group form-row">
                   <div class="col">
                       <label for="name">Sürücü Adı </label>
                      <input type="text" class="form-control"  id="name" name="name" placeholder=" ">
                   </div>
                   <div class="col">
                       <label for="surname">Sürücü Soyadı  </label>
                      <input type="text" class="form-control" id="surname" name="surname"  placeholder=" ">
                   </div>
                </div>
                <div class="form-group form-row">
                   <div class="col">
                       <label for="uyruk">Uyruk  </label>
                      <input type="text" class="form-control"  id="uyruk" name="uyruk" placeholder=" ">
                   </div>
                   <div class="col">
                       <label for="tc">TC - PASSAPORT   </label>
                      <input type="text" class="form-control" id="tc" name="tc"  placeholder=" ">
                   </div>
                </div>
                <div class="form-group">
                    <label for="company_id">Firma</label>

                        <select class="form-control" id="company_id"name="company_id" >
                           <option selected="" disabled="">Firma Seçiniz</option>
                           @php( $companys = \App\CompanyModel::get())
                            @foreach ($companys as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                 </div>
                 <div class="form-group form-row">
                    <div class="col">
                        <label for="name">E-mail Adresi </label>
                       <input type="email" class="form-control"  id="email" name="email" placeholder=" ">
                    </div>
                    <div class="col">
                        <label for="name">Telefon Numarası </label>
                       <input type="text" class="form-control" id="phone" name="phone"  placeholder=" ">
                    </div>
                 </div>
                 <div class="form-group">
                    <label for="adres">Adres</label>
                    <textarea class="form-control" id="adres" name="adres" rows="3"></textarea>
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
