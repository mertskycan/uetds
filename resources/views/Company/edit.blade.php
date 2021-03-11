@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12 col-lg-12">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Firma Düzenle</h4>
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
        <form action="{{ route('company.update', $companyModel->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                    <label for="name">Firma Adı </label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $companyModel->name }}" placeholder="Firma adını yazınız">
                 </div>
                 <div class="form-group form-row">
                    <div class="col">
                        <label for="name">Vergi Dairesi</label>
                       <input type="text" class="form-control"  id="vergidairesi" name="vergidairesi" value="{{ $companyModel->vergidairesi }}" placeholder=" ">
                    </div>
                    <div class="col">
                        <label for="name">Vergi Numarası </label>
                       <input type="text" class="form-control" id="vergino" name="vergino" value="{{ $companyModel->vergino }}" placeholder=" ">
                    </div>
                 </div>
                 <div class="form-group">
                    <label for="adres">Adres</label>
                    <textarea class="form-control" id="adres" name="adres" rows="3"> {{ $companyModel->adres }}</textarea>
                 </div>
                 <div class="form-group form-row">
                    <div class="col">
                        <label for="name">Telefon</label>
                       <input type="text" class="form-control"  id="telefon1" name="telefon1" value="{{ $companyModel->telefon1 }}"placeholder=" ">
                    </div>
                    <div class="col">
                        <label for="name">Telefon 2</label>
                       <input type="text" class="form-control" id="telefon2" name="telefon2" value="{{ $companyModel->telefon2 }}" placeholder=" ">
                    </div>
                 </div>
                   <div class="form-group">
                      <label for="eposta">E-posta</label>
                      <input type="email" class="form-control" id="eposta" name="eposta"value="{{ $companyModel->eposta }}">
                   </div>
                   <div class="form-group form-row">
                      <div class="col">
                          <label for="name">UETDS Kullanıcı Adı</label>
                         <input type="text" class="form-control"  id="uetdskullaniciadi" name="uetdskullaniciadi" value="{{ $companyModel->uetdskullaniciadi }}"placeholder=" ">
                      </div>
                      <div class="col">
                          <label for="name">UETDS Şifre</label>
                         <input type="text" class="form-control" id="uetdssifre" name="uetdssifre"  value="{{ $companyModel->uetdssifre }}"placeholder=" ">
                      </div>
                   </div>

                      <input type="hidden" value="{{ $companyModel->created_user_id }}" class="form-control"  id="created_user_id" name="created_user_id" >

                   <button type="submit" class="btn btn-primary">Kaydet </button>
                   <button type="submit" class="btn iq-bg-danger">Cancel</button>
                </form>
             </div>
          </div>

        </div>
    </div>
</div>

@endsection
