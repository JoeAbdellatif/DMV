
@extends('Admin/LayoutAdmin')


@section('content')
<script>
    function SendId(id) {
        document.getElementById("inputt").value = id;
    }
</script>
<div class="row">
    <div class="col-md-12 ">
        <div class="row">
            <div class="col-md-6">

                <button  type="button" class="btn btn-info"   data-toggle="modal" data-target="#AddnewRecipe" >
                   Add new Vehicle </button>
            </div>
            <div class="col-md-6">
                @if (session('VehAdded'))
                    <div class="alert alert-success">
                        {{ session('VehAdded') }}
                    </div>
                @endif
                @if (session('VehDelete'))
                    <div class="alert alert-danger">
                        {{ session('VehDelete') }}
                    </div>
                @endif
            </div>
        </div>
        <br><br>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Plate No</th>
                    <th scope="col">Code</th>
                    <th scope="col">Category</th>
                    <th scope="col">Name</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($Vehicle as $veh)
                <tr>
                    <td>{{$veh->Platenumber }}</td>
                    <td>{{$veh->CodeName }}</td>
                    <td>{{$veh->CategoryName }}</td>
                    <td>{{$veh->Name}} {{$veh->FatherName}} {{$veh->MotherName}}   </td>
                    {{-- <td><img style="width:10vw;height:20vh;" src="/uploads/Recipe/{{$res->Image2 }}" /> </td> --}}
                    <td> <button id="reject" type="button" class="btn btn-danger"  onclick= "SendId('{{ $veh->id  }}')" data-toggle="modal" data-target="#DeleteRes" >
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                        <a href='Vehicle/{{ $veh->id  }}' class='edit' ><i class='material-icons' data-toggle='tooltip' title='MoreInfo'>&#xE254;</i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Modal -->
<div id="DeleteRes" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="deleteVeh" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <br>
                    <input type="hidden" class="form-control" id="inputt" aria-describedby="text" name="Id"
                        readonly>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Vehicle?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <button type="submit" name="Delete" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="AddnewRecipe" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  action="AddNewVeh" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add New Vehicle</h4>
                    <br>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="Name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Father Name:</strong>
                                <input type="text" name="FatherName" class="form-control" placeholder="Father Name">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Mother Name:</strong>
                                <input type="text" name="MotherName" class="form-control" placeholder="Mother Name">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Phone Number:</strong>
                                <input type="text" name="PhoneNumber" class="form-control" placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Address :</strong>
                                <textarea  type="text" name="Address" class="form-control" cols="20" rows="2" placeholder="Address"> </textarea>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Plate No:</strong>
                                <input type="text" name="Platenumber" class="form-control" placeholder="Plate No">
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Code:</strong>
                                <select class="form-control" name="codeId" >
                                    @foreach($VehiclesCode as $c)
                                    <option value="{{ $c->id }}" >{{ $c->CodeName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Model:</strong>
                                <input type="text" name="Model" class="form-control" placeholder="Model">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Vehicle License:</strong>
                                <input type="file" name="MotorLicense"  class="form-control" placeholder="Motor License">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Category:</strong>
                                <select class="form-control" name="CatId" >
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" >{{ $cat->CategoryName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Horse power:</strong>
                                <select class="form-control" name="powerId" >
                                    @foreach($Horsepowers as $horsep)
                                    <option value="{{ $horsep->id }}" >{{ $horsep->powers }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Model year:</strong>
                                <select class="form-control" name="modelId" >
                                    @foreach($ModelsYear as $modely)
                                    <option value="{{ $modely->id }}" >{{ $modely->years }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Color:</strong>
                                <input type="text" name="color" class="form-control" placeholder="color">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Engine Serial Number:</strong>
                                <input type="text" name="EngineSerialNumber" class="form-control" placeholder="Engine Serial Number">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>StructureNo:</strong>
                                <input type="text" name="StructureNo" class="form-control" placeholder="Structure No">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Registration Date:</strong>
                                <input type="date" name="RegistrationDate" class="form-control" >
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>First Registration Date:</strong>
                                <input type="date" name="FirstRegistrationDate" class="form-control" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>

@stop
