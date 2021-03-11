@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12 col-lg-12">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Yük Seferi Oluştur</h4>
                </div>
             </div>
             <div class="iq-card-body">
                <div class="stepwizard mt-4">
                   <div class="stepwizard-row setup-panel">
                      <div id="user" class="wizard-step active">
                         <a href="#user-detail" class="active btn">
                         <i class="ri-truck-line text-primary"></i><span>Sefer Bilgileri</span>
                         </a>
                      </div>
                      <div id="document" class="wizard-step">
                         <a href="#document-detail" class="btn btn-default disabled">
                         <i class="ri-user-fill text-danger"></i><span>Yük Bilgileri</span>
                         </a>
                      </div>
                      <div id="confirm" class="wizard-step">
                         <a href="#cpnfirm-data" class="btn btn-default disabled">
                         <i class="ri-check-fill text-warning"></i><span>Önizle ve Gönder</span>
                         </a>
                      </div>
                   </div>
                </div>
                <form class="form" id="yuk-bildir">
                   <div class="row setup-content" id="user-detail">
                      <div class="col-sm-12">
                         <div class="col-md-12 p-0">
                            <h3 class="mb-4">Sefer Detaylarınızı Girin:</h3>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch2" name="uetds" value="true" checked="">
                                    <label class="custom-control-label" for="customSwitch2">Uetd Bildirimi Hemen Yapılsın</label>
                                </div>
                            </div>
                                <div class="col-md-3 form-group">
                                    <label for="sofor_1_id">Şöför  </label>
                                    <select class="form-control" id="sofor_1_id"name="sofor_1_id" >
                                        <option selected="" disabled="">Şöför Seçiniz</option>
                                        @php( $sofors = \App\SoforModel::where('company_id',Auth::user()->company_id)->get())
                                         @foreach ($sofors as $item)
                                         <option value="{{ $item->id }}">{{ $item->name }} {{ $item->surname }}</option>
                                         @endforeach
                                     </select>
                                </div>

                           <div class="col-md-3 form-group">
                                    <label for="sofor_2_id">Yedek Şöför   </label>
                                    <select class="form-control" id="sofor_2_id"name="sofor_2_id" >
                                        <option selected="" disabled="">Şöför Seçiniz</option>
                                        @php( $sofors = \App\SoforModel::where('company_id',Auth::user()->company_id)->get())
                                         @foreach ($sofors as $item)
                                         <option value="{{ $item->id }}">{{ $item->name }} {{ $item->surname }}</option>
                                         @endforeach
                                     </select>
                                </div>
                             <div class="col-md-3 form-group">
                                      <label for="plaka">Ön Plaka  </label>
                                      <select class="form-control" id="plaka"name="plaka" >
                                          <option selected="" disabled="">Plaka Seçiniz</option>
                                          @php( $PlakaModel = \App\PlakaModel::where('company_id',Auth::user()->company_id)->get())
                                           @foreach ($PlakaModel as $item)
                                           <option value="{{ $item->id }}">{{ $item->plate }}</option>
                                           @endforeach
                                       </select>
                                  </div>

                             <div class="col-md-3 form-group">
                                      <label for="yedek_plaka">Yedek Plaka   </label>
                                      <select class="form-control" id="yedek_plaka"name="yedek_plaka" >
                                          <option selected="" disabled="">Plaka Seçiniz</option>
                                          @php( $PlakaModel = \App\PlakaModel::where('company_id',Auth::user()->company_id)->get())
                                           @foreach ($PlakaModel as $item)
                                           <option value="{{ $item->id }}">{{ $item->plate }}</option>
                                           @endforeach
                                       </select>
                                  </div>
                                  <div class="col-md-4 form-group">
                                       <label for="sefer_baslangic_tarihi">Sefer Başlangıç Tarihi</label>
                                       <input type="date" class="form-control" id="sefer_baslangic_tarihi"name="sefer_baslangic_tarihi" value="{{ date('Y-m-d') }}">
                                   </div>
                                   <div class="col-md-2 form-group">
                                        <label for="sefer_baslangic_saati">Sefer Başlangıç Saati</label>
                                        <input type="time" class="form-control" id="sefer_baslangic_saati"name="sefer_baslangic_saati" value="{{ date('H:i') }}">
                                    </div>
                                    <div class="col-md-4 form-group">
                                         <label for="sefer_bitis_tarihi">Sefer Bitiş Tarihi</label>
                                         <input type="date" class="form-control" id="sefer_bitis_tarihi"name="sefer_bitis_tarihi" value="{{ date('Y-m-d') }}">
                                     </div>
                                     <div class="col-md-2 form-group">
                                          <label for="sefer_bitis_saati">Sefer Bitiş Saati</label>
                                          <input type="time" class="form-control" id="sefer_bitis_saati"name="sefer_bitis_saati" value="{{ date('H:i') }}">
                                      </div>
                                      <div class="col-md-12 form-group">
                                        <label for="aciklama">Size Özel Açıklama 1 </label>
                                        <textarea class="form-control" id="aciklama" name="aciklama" rows="10"></textarea>
                                       </div>




                               </div>
                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                         </div>
                      </div>
                   </div>
                   <div class="row setup-content" id="document-detail">

                      <div class="col-sm-12 divSide">
                        <div class="col-md-12 p-0">
                            <h3 class="mb-4">Yük Detaylarınızı Girin:</h3>
                            <div class="row">

                                <div class="col-md-6 form-group">
                                    <label for="company_id">Yük Türü</label>

                                <select name="yuk[0][yukCinsId]" title="Yük Türünü Seçiniz" class="form-control yukCinsId" >

                                    <option selected disabled>Seçiniz</option>
                                    @foreach ($yuk_tur_listesi as $item)
                                    <option value="{{ $item->id }}"  key="{{ $item->type }}" >{{ $item->name }}</option>
                                    @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                        <div class="col-md-2 form-group">
                                            <label for="company_id">Yük Miktarı</label>
                                             <input placeholder="örn: 12.5" required="" title="Taşınan yük miktarı" type="text" class="form-control txtQty" name="yuk[0][yukMiktari]">


                                                            </div>

                                        <div class="col-md-4 form-group">
                                            <label for="company_id">Birimi </label>
                                            <select name="yuk[0][yukBirimi]" title="Yük birimini seçin" required="" class="form-control select2 yukBirimi "  >
                                                <option selected disabled keyData="0">Seçiniz</option>
                                                @foreach ($yuk_birim_listesi as $item)
                                                <option value="{{ $item->id }}" style="display: none" keyData="{{ $item->type }}" >{{ $item->name }}</option>
                                                @endforeach
                                            </select>


                                                            </div>
                                <div class="col-md-6 form-group tehlikeli-div" style="display: none">
                                    <label for="company_id">UN TÜRÜ </label>

                                <select name="yuk[0][un_turu]" title="Yük Türünü Seçiniz" class="form-control  unTuru" >

                                    <option  value="0"  selected disabled>Seçiniz</option>
                                    @foreach ($yuk_tehlikeli_madde_un_listesi as $item)
                                    <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                    @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                        <div class="col-md-2 form-group tehlikeli-div" style="display: none">
                                            <label for="company_id">Tehlikeli Madde Taşıma Şekli  </label>

                                <select name="yuk[0][tehlikeli_madde_tasima_sekli]" title="Yük Türünü Seçiniz" class="form-control " >

                                    <option value="0" selected disabled>Seçiniz</option>
                                    @foreach ($yuk_tehlikeli_madde_tasima_sekli as $item)
                                    <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                    @endforeach
                                                                                                        </select>

                                                            </div>

                                        <div class="col-md-4 form-group tehlikeli-div" style="display: none">
                                            <label for="company_id">Muafiyet Türü   </label>
                                            <select name="yuk[0][muaf_turu]" title="Muafiyet Türü   seçin" required="" class="form-control select2  "  >
                                                <option  value="0" selected disabled keyData="0">Seçiniz</option>
                                                @foreach ($yuk_tehlikeli_madde_muaf_turleri as $item)
                                                <option value="{{ $item->id }}"  >{{ $item->name }}</option>
                                                @endforeach
                                            </select>


                                                            </div>
                                <div class="col-md-6 form-group">
                                    <label for="company_id">Gönderen Firma</label>

                                        <select class="form-control" id="yuk[0][from_company_id]"name="yuk[0][from_company_id]" >
                                           <option selected="" disabled="">Firma Seçiniz</option>
                                           @php( $companys = \App\CompanyModel::where('company_user_id',Auth::user()->company_id)->get())
                                            @foreach ($companys as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                 </div>
                                 <div class="col-md-6 form-group">
                                    <label for="company_id">Alıcı Firma</label>

                                        <select class="form-control" id="yuk[0][to_company_id]"name="yuk[0][to_company_id]" >
                                           <option selected="" disabled="">Firma Seçiniz</option>
                                           @php( $companys = \App\CompanyModel::where('company_user_id',Auth::user()->company_id)->get())
                                            @foreach ($companys as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                 </div>
                                <div class="col-md-3 form-group">
                                    <label for="uyruk">Yükleme Ülke </label>
                                    <select class="form-control" id="yuk[0][yukleme_ulke]"name="yuk[0][yukleme_ulke]" >
                                        <option selected="" disabled="">Ülke Seçiniz</option>
                                        @php( $ulke = \DB::table('ulkeler')->get())
                                         @foreach ($ulke as $item)
                                         <option value="{{ $item->id }}">{{ $item->country }} </option>
                                         @endforeach
                                     </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="uyruk">Yükleme İl İlçe </label>
                                    <select class="form-control" id="yuk[0][yukleme_il_ilce_kod]"name="yuk[0][yukleme_il_ilce_kod]" >
                                        <option selected="" disabled="">İl İlçe Seçiniz</option>
                                        @php( $ililce = \DB::table('il_ilce_kod')->get())
                                         @foreach ($ililce as $item)
                                         <option value="{{ $item->id }}">{{ $item->il }}-{{ $item->ilce }} </option>
                                         @endforeach
                                     </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="uyruk">Boşaltma Ülke </label>
                                    <select class="form-control" id="yuk[0][bosaltma_ulke]"name="yuk[0][bosaltma_ulke]" >
                                        <option selected="" disabled="">Ülke Seçiniz</option>
                                        @php( $ulke = \DB::table('ulkeler')->get())
                                         @foreach ($ulke as $item)
                                         <option value="{{ $item->id }}">{{ $item->country }} </option>
                                         @endforeach
                                     </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="uyruk">Boşaltma İl İlçe </label>
                                    <select class="form-control" id="yuk[0][bosaltma_il_ilce_kod]"name="yuk[0][bosaltma_il_ilce_kod]" >
                                        <option selected="" disabled="">İl İlçe Seçiniz</option>
                                        @php( $ililce = \DB::table('il_ilce_kod')->get())
                                         @foreach ($ililce as $item)
                                         <option value="{{ $item->id }}">{{ $item->il }}-{{ $item->ilce }} </option>
                                         @endforeach
                                     </select>
                                </div>
                                  <div class="col-md-4 form-group">
                                       <label for="exampleInputdate">Yükleme Tarih </label>
                                       <input type="date" class="form-control" id="yuk[0][yukleme_tarih]"  name="yuk[0][yukleme_tarih]" value="{{ date('Y-m-d') }}">
                                   </div>
                                   <div class="col-md-2 form-group">
                                        <label for="exampleInputdate">Yükleme Saati</label>
                                        <input type="time" class="form-control" id="yuk[0][yukleme_saat]"  name="yuk[0][yukleme_saat]" value="{{ date('H:i') }}">
                                    </div>
                                    <div class="col-md-4 form-group">
                                         <label for="exampleInputdate">Boşaltma  Tarihi</label>
                                         <input type="date" class="form-control" id="yuk[0][bosaltma_tarihi]" name="yuk[0][bosaltma_tarihi]" value="{{ date('Y-m-d') }}">
                                     </div>
                                     <div class="col-md-2 form-group">
                                          <label for="exampleInputdate">Boşaltma  Saati</label>
                                          <input type="time" class="form-control" id="yuk[0][bosaltma_saati]" name="yuk[0][bosaltma_saati]" value="{{ date('H:i') }}">
                                      </div>





                               </div>
                         </div>
                      </div>
                      <div class="col-sm-12">
                         <div class="col-md-12 p-0">
                      <button class="btn btn-primary addBtn btn-lg pull-right" type="button" >+</button>
                      <button class="btn btn-primary nextBtn lastStep btn-lg pull-right" type="button" >Next</button>
                         </div></div>
                   </div>

                   <div class="row setup-content" id="cpnfirm-data">
                      <div class="col-sm-12">
                         <div class="col-md-12 p-0">
                            <h3 class="mb-4 text-left">Gözden Geçir ve Gönder:</h3>
                            <div class="row justify-content-center" id="htmlData">


                            </div>
                         </div>
                         <div class="col-md-12 p-0">
                      <button class="btn btn-primary SaveBtn btn-lg pull-right" data-type="save" type="button" >Kaydet</button>
                         </div>
                      </div>
                   </div>
                </form>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
@section('script')
    <script>
        $( document ).ready(function() {
        var i=parseInt(0);


        $('body').on('click','.removeBtn', function (e) {
            $(this).parent().parent().remove();
        });

        $('body').on('click','.addBtn', function (e) {
                        e.preventDefault();
                        i++;
        var htmlEl =  '<div class="row">'+
                        '<div class="col-md-12  form-group">'+
                            '<h3 class="mb-4">'+(i+1)+'. Yük Detaylarınızı Girin:</h3>'+
                      '<button class="btn btn-primary removeBtn btn-lg pull-right" type="button" >-</button>'+
                            '</div>'+
                        '<div class="col-md-6 form-group">'+
                            '<label for="company_id">Yük Türü</label>'+

                        '<select name="yuk['+i+'][yukCinsId]" title="Yük Türünü Seçiniz" class="form-control yukCinsId" >'+

                            '<option selected disabled>Seçiniz</option>'+
                            @foreach ($yuk_tur_listesi as $item)
                                    '<option value="{{ $item->id }}"  key="{{ $item->type }}" >{{ $item->name }}</option>'+
                                    @endforeach
                                                                                                '</select>'+
                                                                                            '</div>'+
                                '<div class="col-md-2 form-group">'+
                                    '<label for="company_id">Yük Miktarı</label>'+
                                    '<input placeholder="örn: 12.5" required="" title="Taşınan yük miktarı" type="text" class="form-control txtQty" name="yuk['+i+'][yukMiktari]">'+


                                                    '</div>'+

                                '<div class="col-md-4 form-group">'+
                                    '<label for="company_id">Birimi </label>'+
                                    '<select name="yuk['+i+'][yukBirimi]" title="Yük birimini seçin" required="" class="form-control select2 yukBirimi "  >'+
                                        '<option selected disabled keyData="0">Seçiniz</option>'+
                                        @foreach ($yuk_birim_listesi as $item)
                                                '<option value="{{ $item->id }}" style="display: none" keyData="{{ $item->type }}" >{{ $item->name }}</option>'+
                                        @endforeach
                                    '</select>'+


                                                    '</div>'+
                                                    '<div class="col-md-6 form-group tehlikeli-div" style="display: none">'+
                                                        '<label for="company_id">UN TÜRÜ </label>'+

                                                        '<select name="yuk['+i+'][un_turu]" title="Yük Türünü Seçiniz" class="form-control  unTuru" >'+

                                                            '<option  value="0"  selected disabled>Seçiniz</option>'+
                                    @foreach ($yuk_tehlikeli_madde_un_listesi as $item)
                                    '<option value="{{ $item->id }}" >{{ $item->name }}</option>'+
                                    @endforeach
                                    '</select>'+
                                    '</div>'+
                                    '<div class="col-md-2 form-group tehlikeli-div" style="display: none">'+
                                        '<label for="company_id">Tehlikeli Madde Taşıma Şekli  </label>'+

                                        ' <select name="yuk['+i+'][tehlikeli_madde_tasima_sekli]" title="Yük Türünü Seçiniz" class="form-control " >'+

                                            '<option value="0" selected disabled>Seçiniz</option>'+
                                    @foreach ($yuk_tehlikeli_madde_tasima_sekli as $item)
                                    '<option value="{{ $item->id }}" >{{ $item->name }}</option>'+
                                    @endforeach
                                    '</select>'+

                                    '</div>'+

                                    '<div class="col-md-4 form-group tehlikeli-div" style="display: none">'+
                                        '<label for="company_id">Muafiyet Türü   </label>'+
                                        '<select name="yuk['+i+'][muaf_turu]" title="Muafiyet Türü   seçin" required="" class="form-control select2  "  >'+
                                            '<option  value="0" selected disabled keyData="0">Seçiniz</option>'+
                                                @foreach ($yuk_tehlikeli_madde_muaf_turleri as $item)
                                                '<option value="{{ $item->id }}"  >{{ $item->name }}</option>'+
                                                @endforeach
                                            '</select>'+


                                            '</div>'+
                        '<div class="col-md-6 form-group">'+
                            '<label for="company_id">Gönderen Firma</label>'+

                                '<select class="form-control" id="yuk['+i+'][from_company_id]"name="yuk['+i+'][from_company_id]" >'+
                                '<option selected="" disabled="">Firma Seçiniz</option>'+
                                @php( $companys = \App\CompanyModel::where('company_user_id',Auth::user()->company_id)->get())
                                    @foreach ($companys as $item)
                                    '<option value="{{ $item->id }}">{{ $item->name }}</option>'+
                                    @endforeach
                                '</select>'+
                        '</div>'+
                        '<div class="col-md-6 form-group">'+
                            '<label for="company_id">Alıcı Firma</label>'+

                                '<select class="form-control" id="yuk['+i+'][to_company_id]"name="yuk['+i+'][to_company_id]" >'+
                                '<option selected="" disabled="">Firma Seçiniz</option>'+
                                @php( $companys = \App\CompanyModel::where('company_user_id',Auth::user()->company_id)->get())
                                    @foreach ($companys as $item)
                                    '<option value="{{ $item->id }}">{{ $item->name }}</option>'+
                                    @endforeach
                                '</select>'+
                        '</div>'+
                        '<div class="col-md-3 form-group">'+
                            '<label for="uyruk">Yükleme Ülke </label>'+
                            '<select class="form-control" id="yuk['+i+'][yukleme_ulke]"name="yuk['+i+'][yukleme_ulke]" >'+
                                '<option selected="" disabled="">Ülke Seçiniz</option>'+
                                @php( $ulke = \DB::table('ulkeler')->get())
                                @foreach ($ulke as $item)
                                '<option value="{{ $item->id }}">{{ $item->country }} </option>'+
                                @endforeach
                            '</select>'+
                       '</div>'+
                        '<div class="col-md-3 form-group">'+
                            '<label for="uyruk">Yükleme İl İlçe </label>'+
                            '<select class="form-control" id="yuk['+i+'][yukleme_il_ilce_kod]"name="yuk['+i+'][yukleme_il_ilce_kod]" >'+
                                '<option selected="" disabled="">İl İlçe Seçiniz</option>'+
                                @php( $ililce = \DB::table('il_ilce_kod')->get())
                                @foreach ($ililce as $item)
                                '<option value="{{ $item->id }}">{{ $item->il }}-{{ $item->ilce }} </option>'+
                                @endforeach
                            '</select>'+
                        '</div>'+
                        '<div class="col-md-3 form-group">'+
                            '<label for="uyruk">Boşaltma Ülke </label>'+
                            '<select class="form-control" id="yuk['+i+'][bosaltma_ulke]"name="yuk['+i+'][bosaltma_ulke]" >'+
                                '<option selected="" disabled="">Ülke Seçiniz</option>'+
                                @php( $ulke = \DB::table('ulkeler')->get())
                                @foreach ($ulke as $item)
                                '<option value="{{ $item->id }}">{{ $item->country }} </option>'+
                                @endforeach
                            '</select>'+
                        '</div>'+
                        '<div class="col-md-3 form-group">'+
                           '<label for="uyruk">Boşaltma İl İlçe </label>'+
                            '<select class="form-control" id="yuk['+i+'][bosaltma_il_ilce_kod]"name="yuk['+i+'][bosaltma_il_ilce_kod]" >'+
                                '<option selected="" disabled="">İl İlçe Seçiniz</option>'+
                                @php( $ililce = \DB::table('il_ilce_kod')->get())
                                @foreach ($ililce as $item)
                                '<option value="{{ $item->id }}">{{ $item->il }}-{{ $item->ilce }} </option>'+
                                @endforeach
                            '</select>'+
                        '</div>'+
                        '<div class="col-md-4 form-group">'+
                            '<label for="exampleInputdate">Yükleme Tarih </label>'+
                            '<input type="date" class="form-control" id="yuk['+i+'][yukleme_tarih]"  name="yuk['+i+'][yukleme_tarih]" value="{{ date('Y-m-d') }}">'+
                        '</div>'+
                        '<div class="col-md-2 form-group">'+
                                '<label for="exampleInputdate">Yükleme Saati</label>'+
                                '<input type="time" class="form-control" id="yuk['+i+'][yukleme_saat]"  name="yuk['+i+'][yukleme_saat]" value="{{ date('H:i') }}">'+
                            '</div>'+
                            '<div class="col-md-4 form-group">'+
                                '<label for="exampleInputdate">Boşaltma  Tarihi</label>'+
                                '<input type="date" class="form-control" id="yuk['+i+'][bosaltma_tarihi]" name="yuk['+i+'][bosaltma_tarihi]" value="{{ date('Y-m-d') }}">'+
                            '</div>'+
                            '<div class="col-md-2 form-group">'+
                                '<label for="exampleInputdate">Boşaltma  Saati</label>'+
                                '<input type="time" class="form-control" id="yuk['+i+'][bosaltma_saati]" name="yuk['+i+'][bosaltma_saati]" value="{{ date('H:i') }}">'+
                           '</div>'+





                        '</div>';
                        console.log(i);
                        $('#document-detail .divSide').append(htmlEl);


                      });
            $('body').on('change','.yukCinsId', function(){
                var key = $(this).find(':selected').attr('key');
                $(this).parent().parent().find('.yukBirimi').prop('selectedIndex',0);
                $(this).parent().parent().find('.yukBirimi option[keyData!=0]').hide();
                $(this).parent().parent().find('option[keyData='+key+']').show();
                if(key == 1){
                    $(this).parent().parent().find('.tehlikeli-div').show();
                    $(this).parent().parent().find('.unTuru').select2({
    theme: 'bootstrap4',
});
                }else{

                    $(this).parent().parent().find('.tehlikeli-div').hide();
                }
            });
            $(document).ready(function() {
                ClassicEditor
    .create( document.querySelector( '#aciklama' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
});
function objectifyForm(formArray) {
    //serialize data function
    var returnArray = {};
    for (var i = 0; i < formArray.length; i++){
        returnArray[formArray[i]['name']] = formArray[i]['value'];
    }
    return returnArray;
}
$('.SaveBtn').on( 'click',  function (e) {
    e.preventDefault();
    $('#aciklama').val($('body').find('.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred').html());

    var data = objectifyForm($('#yuk-bildir').serializeArray());
    console.log(JSON.stringify(data, null, 2));
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $.ajax({
    type: "POST",
    url: "{{ route('yuk.store') }}",
    data: data,
    success: function (data) {
        console.log(data);
        window.location.href = "{{ route('yuk.index') }}";

    },
    error: function (data) {
        console.log('Error:', data);

    }
});
});
$('.lastStep').on( 'click',  function (e) {

    $('#aciklama').val($('body').find('.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred').html());

    var jsonData = objectifyForm($('#yuk-bildir').serializeArray());
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
        $.ajax({
        type: "POST",
        url: "{{ route('yuk.check') }}",
        data: jsonData,
        success: function (data) {
            $('#htmlData').html(data);
        },
        error: function (data) {
            console.log('Error:', data);
            $('#htmlData').html(data);

        }
    });

    /*$('#tableSofor').text(data['sofor_1_id']);
    $('#tablePlaka').text(data['plaka']);
    $('#tableSeferBaslangic').text(data['sefer_baslangic_tarihi']+' '+data['sefer_baslangic_saati']);
    $('#tableSeferBitis').text(data['sefer_bitis_tarihi']+' '+data['sefer_bitis_saati']);
    $('#tableAciklama').html(data['aciklama']);
    console.log(data);*/
    /*for (var d=0; d<i; d++) {
    $('#yukDetay').append('<tr>'+
                                            '<th>'+(d+1)+' #</th>'+
                                            '<th>'+data['yuk['+d+'][yukMiktari]']+'</th>'+
                                            '<th>'+data['yuk['+d+'][from_company_id]']+'</th>'+
                                            '<th>'+data['yuk['+d+'][to_company_id]']+'</th>'+
                                            '<th>'+data['yuk['+d+'][yukleme_ulke]']+' '+data['yuk['+d+'][yukleme_il_ilce_kod]']+' '+
                                            '<th>'+data['yuk['+d+'][yukleme_tarih]']+' '+data['yuk['+d+'][yukleme_saat]']+'</th>'+
                                            '<th>'+data['yuk['+d+'][bosaltma_ulke]']+' '+data['yuk['+d+'][bosaltma_il_ilce_kod]']+' '+
                                            '<th>'+data['yuk['+d+'][bosaltma_tarihi]']+' '+data['yuk['+d+'][bosaltma_saati]']+'</th>'+
                                         '</tr>');
    }*/


});


});
        </script>
@endsection
