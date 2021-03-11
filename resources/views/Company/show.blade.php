@extends('layouts.app')


@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-lg-4">
          <div class="iq-card">
             <div class="iq-card-body pl-0 pr-0 pt-0">
                <div class="doctor-details-block">
                   <div class="doc-profile-bg bg-primary" style="height:150px;">
                   </div>
                   <div class="doctor-profile text-center">
                      <img src="{{asset('images/user/11.png')}}" alt="profile-img" class="avatar-130 img-fluid">
                   </div>
                   <div class="text-center mt-3 pl-3 pr-3">
                      <h4><b>{{ $companyModel->user->name}}</b></h4>
                      <p>Firma Sorumslusu</p>
                      <p class="mb-0">{{ $companyModel->name}}</p>
                   </div>
                   <hr>
                   <ul class="doctoe-sedual d-flex align-items-center justify-content-between p-0 m-0">
                      <li class="text-center">
                         <h3 class="counter">4500</h3>
                         <span>Plaka</span>
                       </li>
                       <li class="text-center">
                         <h3 class="counter">100</h3>
                         <span>Şöför</span>
                       </li>
                       <li class="text-center">
                         <h3 class="counter">10000</h3>
                         <span>Kullanıcı</span>
                       </li>
                   </ul>
                </div>
             </div>
          </div>
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Firma Bilgileri</h4>
                </div>
             </div>
             <div class="iq-card-body">
                <div class="about-info m-0 p-0">
                   <div class="row">
                      <div class="col-4">Firma Adı:</div>
                      <div class="col-8">{{ $companyModel->name}}</div>
                      <div class="col-4">Vergi Dairesi:</div>
                      <div class="col-8">{{ $companyModel->vergidairesi}}</div>
                      <div class="col-4">Vergi Numarası:</div>
                      <div class="col-8">{{ $companyModel->vergino}}</div>
                      <div class="col-4">Adres:</div>
                      <div class="col-8">{{ $companyModel->adres}}</div>
                      <div class="col-4">E-posta:</div>
                      <div class="col-8"><a href="mailto:{{ $companyModel->eposta}}"> {{ $companyModel->eposta}} </a></div>
                      <div class="col-4">Telefon:</div>
                      <div class="col-8"><a href="tel:{{ $companyModel->phone1}}">{{ $companyModel->phone1}}</a></div>
                      <div class="col-4">Telefon 2:</div>
                      <div class="col-8"><a href="tel:{{ $companyModel->phone2}}">{{ $companyModel->phone2}}</a></div>
                      <div class="col-4">UETDS Kullanıcı Adı:</div>
                      <div class="col-8">{{ $companyModel->uetdskullaniciadi}}</div>
                      <div class="col-4">UETDS Şifre:</div>
                      <div class="col-8">{{ $companyModel->uetdssifre}}</div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="col-lg-8">
          <div class="row">
            <div class="col-md-12">
               <div class="iq-card">
                  <div class="iq-card-header d-flex justify-content-between">
                     <div class="iq-header-title">
                        <h4 class="card-title">Seferler</h4>
                     </div>
                  </div>
                  <div class="iq-card-body">
                     <table class="table mb-0 table-borderless">
                      <thead>
                          <tr>
                              <th scope="col">Year</th>
                              <th scope="col">Department</th>
                              <th scope="col">Position</th>
                              <th scope="col">Hospital</th>
                              <th scope="col">Feedback</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>2014 - 2018</td>
                              <td>MBBS, M.D</td>
                              <td>Senior doctor</td>
                              <td>Midtown Medical Clinic</td>
                              <td><span class="badge badge-primary">Good</span></td>
                          </tr>
                          <tr>
                              <td>2018 - 2020</td>
                              <td>M.D. of Medicine</td>
                              <td>Associate Prof.</td>
                              <td>Netherland Medical College</td>
                              <td><span class="badge badge-success">excellence</span></td>
                          </tr>
                      </tbody>
                  </table>
                  </div>
               </div>
            </div>
              <div class="col-md-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Yükler</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <table class="table mb-0 table-borderless">
                   <thead>
                       <tr>
                           <th scope="col">Year</th>
                           <th scope="col">Degree</th>
                           <th scope="col">Institute</th>
                           <th scope="col">Result</th>
                       </tr>
                   </thead>
                   <tbody>
                       <tr>
                           <td>2010</td>
                           <td>MBBS, M.D</td>
                           <td>University of Wyoming</td>
                           <td><span class="badge badge-success">Distinction</span></td>
                       </tr>
                       <tr>
                           <td>2014</td>
                           <td>M.D. of Medicine</td>
                           <td>Netherland Medical College</td>
                           <td><span class="badge badge-success">Distinction</span></td>
                       </tr>
                   </tbody>
               </table>
               </div>
            </div>
         </div>
             <div class="col-md-6">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Speciality</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <ul class="speciality-list m-0 p-0">
                         <li class="d-flex mb-4 align-items-center">
                            <div class="user-img img-fluid"><a href="#" class="iq-bg-primary"><i class="ri-award-fill"></i></a></div>
                            <div class="media-support-info ml-3">
                               <h6>professional</h6>
                               <p class="mb-0">Certified Skin Treatment</p>
                            </div>
                         </li>
                         <li class="d-flex mb-4 align-items-center">
                            <div class="user-img img-fluid"><a href="#" class="iq-bg-warning"><i class="ri-award-fill"></i></a></div>
                            <div class="media-support-info ml-3">
                               <h6>Certified</h6>
                               <p class="mb-0">Cold Laser Operation</p>
                            </div>
                         </li>
                         <li class="d-flex mb-4 align-items-center">
                            <div class="user-img img-fluid"><a href="#" class="iq-bg-info"><i class="ri-award-fill"></i></a></div>
                            <div class="media-support-info ml-3">
                               <h6>Medication Laser</h6>
                               <p class="mb-0">Hair Lose Product</p>
                            </div>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>
             <div class="col-md-6">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Notifications</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <ul class="iq-timeline">
                         <li>
                            <div class="timeline-dots border-success"></div>
                            <h6 class="">Dr. Joy Send you Photo</h6>
                            <small class="mt-1">23 November 2019</small>
                         </li>
                         <li>
                            <div class="timeline-dots border-danger"></div>
                            <h6 class="">Reminder : Opertion Time!</h6>
                            <small class="mt-1">20 November 2019</small>
                         </li>
                         <li>
                            <div class="timeline-dots border-primary"></div>
                            <h6 class="mb-1">Patient Call</h6>
                            <small class="mt-1">19 November 2019</small>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>
             <div class="col-md-6">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Schedule</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <ul class="list-inline m-0 p-0">
                         <li>
                            <h6 class="float-left mb-1">Ruby saul (Blood Check)</h6>
                            <small class="float-right mt-1">Today</small>
                            <div class="d-inline-block w-100">
                               <p class="badge badge-primary">09:00 AM </p>
                            </div>
                         </li>
                         <li>
                            <h6 class="float-left mb-1">  Anna Mull (Fever)</h6>
                            <small class="float-right mt-1">Today</small>
                            <div class="d-inline-block w-100">
                               <p class="badge badge-danger">09:15 AM </p>
                            </div>
                         </li>
                         <li>
                            <h6 class="float-left mb-1">Petey Cruiser (X-ray)</h6>
                            <small class="float-right mt-1">Today</small>
                            <div class="d-inline-block w-100">
                               <p class="badge badge-warning">10:00 AM </p>
                            </div>
                         </li>
                         <li>
                            <h6 class="float-left mb-1">Anna Sthesia (Full body Check up)</h6>
                            <small class="float-right mt-1">Today</small>
                            <div class="d-inline-block w-100">
                               <p class="badge badge-info">01:00 PM </p>
                            </div>
                         </li>
                         <li>
                            <h6 class="float-left mb-1">Paul Molive (Operation)</h6>
                            <small class="float-right mt-1">Tomorrow</small>
                            <div class="d-inline-block w-100">
                               <p class="badge badge-success">09:00 AM </p>
                            </div>
                         </li>

                      </ul>
                   </div>
                </div>
             </div>
             <div class="col-md-6">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Patients Notes</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                       <ul class="list-inline m-0 p-0">
                         <li class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                               <h6>Treatment was good!</h6>
                               <p class="mb-0">Eye Test </p>
                            </div>
                            <div><a href="#" class="btn iq-bg-primary">Open</a></div>
                         </li>
                         <li class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                               <h6>My Helth in better Now</h6>
                               <p class="mb-0">Fever Test</p>
                            </div>
                            <div><a href="#" class="btn iq-bg-primary">Open</a></div>
                         </li>
                         <li class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                               <h6>No Effacted</h6>
                               <p class="mb-0">Thyroid Test</p>
                            </div>
                            <div><a href="#" class="btn iq-bg-danger">Close</a></div>
                         </li>
                         <li class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                               <h6>Operation Successfull</h6>
                               <p class="mb-0">Orthopaedic</p>
                            </div>
                            <div><a href="#" class="btn iq-bg-primary">Open</a></div>
                         </li>
                         <li class="d-flex align-items-center justify-content-between mb-3">
                            <div>
                               <h6>Mediacal Care is just a click away</h6>
                               <p class="mb-0">Join Pain </p>
                            </div>
                            <div><a href="#" class="btn iq-bg-danger">Close</a></div>
                         </li>
                         <li class="d-flex align-items-center justify-content-between">
                            <div>
                               <h6>Treatment is good</h6>
                               <p class="mb-0">Skin Treatment </p>
                            </div>
                            <div><a href="#" class="btn iq-bg-primary">Open</a></div>
                         </li>
                      </ul>
                   </div>
                </div>
             </div>

          </div>
       </div>
    </div>
 </div>
@endsection
