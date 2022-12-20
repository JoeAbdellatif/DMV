
@extends('Admin/LayoutAdmin')


@section('content')
<div class="container ">
    <section class="member-details ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="img-container">
                        <img src="/uploads/avatar/{{ $Vehicle->MotorLicense  }}" alt="team member"
                            class="img-full">
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="member_designation">
                        <h2>{{ $Vehicle->Name  }} {{ $Vehicle->FatherName  }} {{ $Vehicle->MotherName  }} </h2>
                        <span>{{ $Vehicle->CodeName  }} {{ $Vehicle->Platenumber  }} </span>
                    </div>
                    <div class="member_desc">
                        <p>
                            {{ $Vehicle->Address  }}

                        </p>
                        <ul class="styled_list">
                            <li class=""><i style="color :#4183c9;"
                                class="fa fa-chevron-circle-right red-color" aria-hidden="true"></i> Car model :
                                <strong>{{$Vehicle->Model}} </strong>
                            </li>
                            <li class=""><i style="color :#4183c9;"
                                class="fa fa-chevron-circle-right red-color" aria-hidden="true"></i> Category :   <strong>{{$Vehicle->CategoryName}}</strong>
                            </li>
                            <li class=""><i style="color :#4183c9;"
                                    class="fa fa-chevron-circle-right red-color" aria-hidden="true"></i> Model year :
                                    <strong>  {{$Vehicle->years}} </strong>
                            </li>
                            <li class=""><i style="color :#4183c9;"
                                    class="fa fa-chevron-circle-right red-color" aria-hidden="true"></i> Car Color :   <strong>{{$Vehicle->color}}</strong>
                            </li>
                        </ul>
                        <div class="bg-image " style="background-image: url('https://www.bootdey.com/img/Content/bg_element.jpg');">
                            <div class="member_contact">
                                <div class="row">
                                    <div class="col-lg-6  mb-3 mb-lg-0">
                                        <div class="media-box">
                                            <div class="media-icon">
                                                <i class="fa fa-tablet" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-content">
                                                <h5>Phone</h5>
                                                <p><a href="callto"> {{$Vehicle->PhoneNumber}}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6  mb-3 mb-lg-0">
                                        <div class="media-box">
                                            <div class="media-icon">
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-content">
                                                <h5>Email</h5>
                                                <p><a href="mailto">info@example.com</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="member_desc mt-5">
                        <h2>Car Details<span style="margin-bottom:10px;float:right;font-size:15px;">Horse power : <strong>{{ $Vehicle->powers  }}</strong></span></h2>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th>
                                        Engine Serial No.
                                    </th>
                                    <th>
                                        Structure No.
                                    </th>
                                    <th>
                                        Registration Date
                                    </th>
                                    <th>
                                        First Registration Date
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>{{$Vehicle->EngineSerialNumber}}</td>
                                        <td>{{$Vehicle->StructureNo}}</td>
                                        <td>{{$Vehicle->RegistrationDate}}</td>
                                        <td>{{$Vehicle->FirstRegistrationDate}}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
            </div>
        </div>
    </section>
</div>
@stop
