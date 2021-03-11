<?php

namespace App\Http\Controllers;

use App\SeferModel;
use CodeDredd\Soap\Facades\Soap;
use CodeDredd\Soap\Client\Response;
use Illuminate\Support\Facades\Auth;
use App\YukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use Maatwebsite\Excel\Facades\Excel as MaatExcel;

use App\Imports\YukImport;
use App\Imports\SeferImport;

class YukController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function  excelYuk(Request $request){
        return MaatExcel::import(new SeferImport, $request->file('excelss'));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $SeferModel = SeferModel::latest()->paginate(10);

        return view('Yuk.index', compact('SeferModel'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = SeferModel::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('create', function(SeferModel $SeferModel) {
                    return date('d/m/Y', strtotime($SeferModel->created_at));
                })
                ->addColumn('sDate', function(SeferModel $SeferModel) {
                    return date('d/m/Y', strtotime($SeferModel->start_date)).' '.date('H:i', strtotime($SeferModel->start_time));
                })
                ->addColumn('eDate', function(SeferModel $SeferModel) {
                    return date('d/m/Y', strtotime($SeferModel->end_date)).' '.date('H:i', strtotime($SeferModel->end_time));
                })
                ->addColumn('sofor', function(SeferModel $SeferModel) {
                    return getModelData('SoforModel',$SeferModel->driver_1_id,'name').' '.getModelData('SoforModel',$SeferModel->driver_1_id,'surname');
                })
                ->addColumn('plaka', function(SeferModel $SeferModel) {
                    return getModelData('PlakaModel',$SeferModel->plate_1_id,'plate');
                })
                ->addColumn('action', function(SeferModel $SeferModel){
                    $actionBtn = '<a href="'.route('yuk.edit',$SeferModel->id).'" class="edit btn btn-success btn-sm">Düzenle</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Sil</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $yuk_tur_listesi = DB::table('yuk_tur_listesi')->get();
        $yuk_birim_listesi = DB::table('yuk_birim_listesi')->get();
        $yuk_tehlikeli_madde_tasima_sekli = DB::table('yuk_tehlikeli_madde_tasima_sekli')->get();
        $yuk_tehlikeli_madde_muaf_turleri = DB::table('yuk_tehlikeli_madde_muaf_turleri')->get();
        $yuk_tehlikeli_madde_un_listesi = DB::table('yuk_tehlikeli_madde_un_listesi')->get();

        return view('Yuk.create', compact('yuk_tur_listesi','yuk_birim_listesi','yuk_tehlikeli_madde_tasima_sekli','yuk_tehlikeli_madde_muaf_turleri','yuk_tehlikeli_madde_un_listesi'));
    }
    public function ajax_yuk_turu(Request $request){
        $yukturu =  Soap::baseWsdl('https://servis.turkiye.gov.tr/services/g2g/kdgm/test/uetdsesya?wsdl')
        ->withBasicAuth(Auth::user()->company->uetdskullaniciadi, Auth::user()->company->uetdssifre)
        ->paramTasimaTurleri([
         'wsuser' => [
             'kullaniciAdi' => Auth::user()->company->uetdskullaniciadi,
             'sifre' => Auth::user()->company->uetdssifre,
         ]
         ])
         ->throw()
         ->json();
         foreach ($yukturu->tasimaTuruListesi as $key => $value) {
             return $value->kodu;
         }

         return $response;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $yuk = new SeferModel;
        $yuk->plate_1_id = $request->plaka;
        $yuk->plate_2_id = checkEmpty($request->yedek_plaka);
        $yuk->driver_1_id = $request->sofor_1_id;
        $yuk->driver_2_id = checkEmpty($request->sofor_2_id);
        $yuk->start_date = $request->sefer_baslangic_tarihi;
        $yuk->start_time = $request->sefer_baslangic_saati;
        $yuk->end_date = $request->sefer_bitis_tarihi;
        $yuk->end_time = $request->sefer_bitis_saati;
        $yuk->user_id = Auth::user()->id;
        $yuk->note = $request->aciklama;
        $yuk->created_at = date('Y-m-d H:i:s');
        $yuk->updated_at = date('Y-m-d H:i:s');
        if($yuk->save()){
        if($request->uetds == 'true'){
            $uetds =  Soap::baseWsdl('https://servis.turkiye.gov.tr/services/g2g/kdgm/test/uetdsesya?wsdl')
            ->withBasicAuth(Auth::user()->company->uetdskullaniciadi, Auth::user()->company->uetdssifre)
            ->yeniSeferEkleV3([
             'wsuser' => [
                 'kullaniciAdi' => Auth::user()->company->uetdskullaniciadi,
                 'sifre' => Auth::user()->company->uetdssifre,
             ],
             'seferBilgileriInput' => [
                'plaka1' => getModelData('PlakaModel',$request->plaka,'plate'),
                'plaka2' => getModelData('PlakaModel',$request->yedek_plaka,'plate'),
                'sofor1TCNo' => getModelData('SoforModel',$request->sofor_1_id,'tc'),
                'sofor2TCNo' => getModelData('SoforModel',$request->sofor_2_id,'tc'),
                'baslangicTarihi' => date('d/m/Y', strtotime($request->sefer_baslangic_tarihi)),
                'baslangicSaati' => date('H:i', strtotime($request->sefer_baslangic_saati)),
                'bitisTarihi' => date('d/m/Y', strtotime($request->sefer_bitis_tarihi)),
                'bitisSaati' => date('H:i', strtotime($request->sefer_bitis_saati)),
                'firmaSeferNo' => date("y").'/'.str_pad($yuk->id, 5, '0', STR_PAD_LEFT),
            ]
             ])
             ->throw()
             ->json();


        $sefer = SeferModel::find($yuk->id);
        $sefer->company_transfer_no = $uetds['return']['firmaSeferNo'];
        $sefer->status_code = $uetds['return']['sonucKodu'];
        $sefer->sefer_id = $uetds['return']['seferId'];

        if($sefer->save()){
        }
        }
        foreach($request->yuk as $key=>$value){
            $seferYuk = new YukModel;
            $seferYuk->yuk_sefer_id = $yuk->id;
            $seferYuk->yuk_tasima_tur_id = $value['yukCinsId'];
            $seferYuk->yuk_ulke_id = $value['yukleme_ulke'];
            $seferYuk->yuk_il_mernis_id = checkEmpty($value['yukleme_il_ilce_kod']);
            $seferYuk->yuk_ilce_mernis_id = checkEmpty($value['yukleme_il_ilce_kod']);
            $seferYuk->yuk_bosalt_ulke_id = $value['bosaltma_ulke'];
            $seferYuk->yuk_bosalt_il_mernis_id = checkEmpty($value['bosaltma_il_ilce_kod']);
            $seferYuk->yuk_bosalt_ilce_mernis_id = checkEmpty($value['bosaltma_il_ilce_kod']);
            $seferYuk->yuk_yukleme_date = $value['yukleme_tarih'];
            $seferYuk->yuk_yukleme_time = $value['yukleme_saat'];
            $seferYuk->yuk_bosaltma_date = $value['bosaltma_tarihi'];
            $seferYuk->yuk_bosaltma_time = $value['bosaltma_saati'];
            $seferYuk->yuk_cins_id = $value['yukCinsId'];
            if( isset($value['tehlikeli_madde_tasima_sekli']) ) {
            $seferYuk->yuk_tehlikeli_madde = checkEmpty($value['tehlikeli_madde_tasima_sekli']);
            $seferYuk->yuk_muaf_tur = checkEmpty($value['muaf_turu']);
            $seferYuk->yuk_unId = checkEmpty($value['un_turu']);
            }
            $seferYuk->yuk_adet = $value['yukMiktari'];
            $seferYuk->yuk_birim = $value['yukBirimi'];
            $seferYuk->company_id = $value['from_company_id'];
            $seferYuk->alici_company_id = $value['to_company_id'];
            $seferYuk->yuk_firma_no = date("y").'/'.str_pad($yuk->id, 5, '0', STR_PAD_LEFT);
            $seferYuk->yuk_id = 0;
            $seferYuk->created_at = date('Y-m-d H:i:s');
            $seferYuk->updated_at = date('Y-m-d H:i:s');
            $seferYuk->save();
            if($request->uetds == 'true'){
                if( isset($value['tehlikeli_madde_tasima_sekli']) ) {
                    echo getDbData('yuk_tehlikeli_madde_un_listesi',$value['un_turu'],'code').'00<br>';
                    $uetds =  Soap::baseWsdl('https://servis.turkiye.gov.tr/services/g2g/kdgm/test/uetdsesya?wsdl')
                    ->withBasicAuth(Auth::user()->company->uetdskullaniciadi, Auth::user()->company->uetdssifre)
                    ->sefereYukEkleV3([
                     'wsuser' => [
                         'kullaniciAdi' => Auth::user()->company->uetdskullaniciadi,
                         'sifre' => Auth::user()->company->uetdssifre,
                     ],
                     'seferId' => $sefer->sefer_id,
                     'yukBilgileriInputList' => [
                        'tasimaTuruKodu' => getDbData('yuk_tur_listesi',$value['yukCinsId'],'type'),
                        'yuklemeUlkeKodu' => getModelData('UlkeModel',$value['yukleme_ulke'],'code'),
                        'yuklemeIlMernisKodu' => getDbData('il_ilce_kod',$value['yukleme_il_ilce_kod'],'il_kodu'),
                        'yuklemeIlceMernisKodu' => getDbData('il_ilce_kod',$value['yukleme_il_ilce_kod'],'ilce_kodu'),
                        'bosaltmaUlkeKodu' => getModelData('UlkeModel',$value['bosaltma_ulke'],'code'),
                        'bosaltmaIlMernisKodu' => getDbData('il_ilce_kod',$value['bosaltma_il_ilce_kod'],'il_kodu'),
                        'bosaltmaIlceMernisKodu' => getDbData('il_ilce_kod',$value['bosaltma_il_ilce_kod'],'ilce_kodu'),
                        'yuklemeTarihi' => date('d/m/Y', strtotime($value['yukleme_tarih'])),
                        'yuklemeSaati' => date('H:i', strtotime($value['yukleme_saat'])),
                        'bosaltmaTarihi' => date('d/m/Y', strtotime($value['bosaltma_tarihi'])),
                        'bosaltmaSaati' => date('H:i', strtotime($value['bosaltma_saati'])),
                        'yukCinsId' => getDbData('yuk_tur_listesi',$value['yukCinsId'],'code'),
                        'yukCinsDigerAciklama' => 'none',
                        'tehlikeliMaddeTasimaSekli' => getDbData('yuk_tehlikeli_madde_tasima_sekli',$value['tehlikeli_madde_tasima_sekli'],'code'),
                        'muafiyetTuru' => getDbData('yuk_tehlikeli_madde_muaf_turleri',$value['muaf_turu'],'code'),
                        'unId' => getDbData('yuk_tehlikeli_madde_un_listesi',$value['un_turu'],'code').'00',
                        'yukMiktari' => $value['yukMiktari'],
                        'yukMiktariBirimi' => getDbData('yuk_birim_listesi',$value['yukBirimi'],'code'),
                        'gonderenUnvan' => getModelData('CompanyModel',$value['from_company_id'],'name'),
                        'gonderenVergiNo' => getModelData('CompanyModel',$value['from_company_id'],'vergino'),
                        'aliciUnvan' => getModelData('CompanyModel',$value['to_company_id'],'name'),
                        'aliciVergiNo' => getModelData('CompanyModel',$value['to_company_id'],'vergino'),
                        'firmaYukNo' => date("y").'/'.str_pad($yuk->id, 5, '0', STR_PAD_LEFT),
                    ]
                     ])
                     ->throw()
                     ->json();
                     echo 'tehlikeli';
                     print_r( $uetds );
                     echo 'tehlikeli';
                }else {
                    $uetds =  Soap::baseWsdl('https://servis.turkiye.gov.tr/services/g2g/kdgm/test/uetdsesya?wsdl')
                    ->withBasicAuth(Auth::user()->company->uetdskullaniciadi, Auth::user()->company->uetdssifre)
                    ->sefereYukEkleV3([
                     'wsuser' => [
                         'kullaniciAdi' => Auth::user()->company->uetdskullaniciadi,
                         'sifre' => Auth::user()->company->uetdssifre,
                     ],
                     'seferId' => $sefer->sefer_id,
                     'yukBilgileriInputList' => [
                        'tasimaTuruKodu' => getDbData('yuk_tur_listesi',$value['yukCinsId'],'type'),
                        'yuklemeUlkeKodu' => getModelData('UlkeModel',$value['yukleme_ulke'],'code'),
                        'yuklemeIlMernisKodu' => getDbData('il_ilce_kod',$value['yukleme_il_ilce_kod'],'il_kodu'),
                        'yuklemeIlceMernisKodu' => getDbData('il_ilce_kod',$value['yukleme_il_ilce_kod'],'ilce_kodu'),
                        'bosaltmaUlkeKodu' => getModelData('UlkeModel',$value['bosaltma_ulke'],'code'),
                        'bosaltmaIlMernisKodu' => getDbData('il_ilce_kod',$value['bosaltma_il_ilce_kod'],'il_kodu'),
                        'bosaltmaIlceMernisKodu' => getDbData('il_ilce_kod',$value['bosaltma_il_ilce_kod'],'ilce_kodu'),
                        'yuklemeTarihi' => date('d/m/Y', strtotime($value['yukleme_tarih'])),
                        'yuklemeSaati' => date('H:i', strtotime($value['yukleme_saat'])),
                        'bosaltmaTarihi' => date('d/m/Y', strtotime($value['bosaltma_tarihi'])),
                        'bosaltmaSaati' => date('H:i', strtotime($value['bosaltma_saati'])),
                        'yukCinsId' => getDbData('yuk_tur_listesi',$value['yukCinsId'],'code'),
                        'yukCinsDigerAciklama' => 'none',
                        'yukMiktari' => $value['yukMiktari'],
                        'yukMiktariBirimi' => getDbData('yuk_birim_listesi',$value['yukBirimi'],'code'),
                        'gonderenUnvan' => getModelData('CompanyModel',$value['from_company_id'],'name'),
                        'gonderenVergiNo' => getModelData('CompanyModel',$value['from_company_id'],'vergino'),
                        'aliciUnvan' => getModelData('CompanyModel',$value['to_company_id'],'name'),
                        'aliciVergiNo' => getModelData('CompanyModel',$value['to_company_id'],'vergino'),
                        'firmaYukNo' => date("y").'/'.str_pad($yuk->id, 5, '0', STR_PAD_LEFT),
                    ]
                     ])
                     ->throw()
                     ->json();
                    }


            $yuks = YukModel::find($seferYuk->id);
            $yuks->yuk_id = $uetds['return']['uetdsEsyaSonuc']['0']['yukId'];
            $yuks->save();
            }
        }

        echo 'ok';

        }
        //YukModel::create($request->all());

        //return redirect()->route('yuk.index')->with('success', 'YukModel created successfully.');
    }

 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkData(Request $request)
    {


        $htmlData = '<div class="col-12">'.
        '<table class="table table-striped- table-bordered table-hover table-checkable" style="width:47vw;margin: 0 auto;margin-bottom: 30px;">'.
        '<tbody><tr>'.
        '<th>Şöför:</th>'.
        '<td id="tableSofor">'.getModelData('SoforModel',$request->sofor_1_id,'name').' '.getModelData('SoforModel',$request->sofor_1_id,'surname');
        if($request->sofor_2_id){
            $htmlData .= ' - '.getModelData('SoforModel',$request->sofor_2_id,'name').' '.getModelData('SoforModel',$request->sofor_2_id,'surname').'</td>';
        }else{
            $htmlData .= '</td>';
        }
        $htmlData .= '</tr><tr>'.
        '<th>Plaka:</th>'.
        '<td id="tablePlaka">'.getModelData('PlakaModel',$request->plaka,'plate');
        if($request->yedek_plaka){
            $htmlData .= ' - '.getModelData('PlakaModel',$request->yedek_plaka,'plate').'</td>';
        }else{
            $htmlData .= '</td>';
        }
        $htmlData .= '</tr><tr>'.
        '<th>Sefer Başlangıç:</th>'.
        '<td id="tableSeferBaslangic">'.$request->sefer_baslangic_tarihi.' '.$request->sefer_baslangic_saati.'</td>'.
        '</tr><tr>'.
        '<th>Sefer Bitiş:</th>'.
        '<td id="tableSeferBitis">'.$request->sefer_bitis_tarihi.' '.$request->sefer_bitis_saati.'</td>'.
        '</tr><tr>'.
        '<th>Açıklama:</th>'.
        '<td id="tableAciklama">'.$request->aciklama.'</td>'.
        '</tr>'.
        '</tbody></table>'.
        '</div>'.
        '<div class="col-12">'.
        '<table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">'.
        '<thead>'.
        '<tr>'.
        '<th>Yuk No #</th>'.
        '<th>Yük</th>'.
        '<th>Gönderici</th>'.
        '<th>Alıcı</th>'.
        '<th>Yükleme Yeri</th>'.
        '<th>Yükleme Tarihi</th>'.
        '<th>Boşaltma Yeri</th>'.
        '<th>Boşaltma Tarihi</th>'.
            '</tr>'.
            '</thead>'.
            '<tbody id="yukDetay">';

        foreach($request->yuk as $key=>$value){
            $htmlData .= '<tr>'.
                                            '<th>'.($key+1).' #</th>'.
                                            '<th>'.getDbData('yuk_tur_listesi',$value['yukCinsId'],'name').' / '.$value['yukMiktari'].' '.getDbData('yuk_birim_listesi',$value['yukBirimi'],'name').'</th>'.
                                            '<th>'.getModelData('CompanyModel',$value['from_company_id'],'name').' - '.getModelData('CompanyModel',$value['from_company_id'],'vergino').'</th>'.
                                            '<th>'.getModelData('CompanyModel',$value['to_company_id'],'name').' - '.getModelData('CompanyModel',$value['to_company_id'],'vergino').'</th>'.
                                            '<th>'.getModelData('UlkeModel',$value['yukleme_ulke'],'country').' - '.getDbData('il_ilce_kod',$value['yukleme_il_ilce_kod'],'il').' - '.getDbData('il_ilce_kod',$value['yukleme_il_ilce_kod'],'ilce').'</th>'.
                                            '<th>'.$value['yukleme_tarih'].' '.$value['yukleme_saat'].'</th>'.
                                            '<th>'.getModelData('UlkeModel',$value['bosaltma_ulke'],'country').' - '.getDbData('il_ilce_kod',$value['bosaltma_il_ilce_kod'],'il').' - '.getDbData('il_ilce_kod',$value['bosaltma_il_ilce_kod'],'ilce').'</th>'.
                                            '<th>'.$value['bosaltma_tarihi'].' '.$value['bosaltma_saati'].'</th>'.
                                         '</tr>';
        }
        $htmlData .='</tbody></table></div>';
        return $htmlData;
        //YukModel::create($request->all());

        //return redirect()->route('yuk.index')->with('success', 'YukModel created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\YukModel  $yukModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\YukModel  $yukModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $SeferModel = SeferModel::with('yukler')->findOrFail($id);
                $yuk_tur_listesi = DB::table('yuk_tur_listesi')->get();
        $yuk_birim_listesi = DB::table('yuk_birim_listesi')->get();
        $yuk_tehlikeli_madde_tasima_sekli = DB::table('yuk_tehlikeli_madde_tasima_sekli')->get();
        $yuk_tehlikeli_madde_muaf_turleri = DB::table('yuk_tehlikeli_madde_muaf_turleri')->get();
        $yuk_tehlikeli_madde_un_listesi = DB::table('yuk_tehlikeli_madde_un_listesi')->get();

        return view('Yuk.edit', compact('SeferModel', 'yuk_tur_listesi','yuk_birim_listesi','yuk_tehlikeli_madde_tasima_sekli','yuk_tehlikeli_madde_muaf_turleri','yuk_tehlikeli_madde_un_listesi'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\YukModel  $yukModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, YukModel $yukModel)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $yukModel->update($request->all());

        return redirect()->route('yuk.index')
            ->with('success', 'YukModel updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\YukModel  $yukModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(YukModel $yukModel)
    {
         $request->validate([
        'name' => 'required',
        'introduction' => 'required',
        'location' => 'required',
        'cost' => 'required'
    ]);
    $yukModel->update($request->all());

    return redirect()->route('yuk.index')
        ->with('success', 'YukModel updated successfully');
    }
}
