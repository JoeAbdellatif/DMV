
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

                <button  type="button" class="btn btn-info"   data-toggle="modal" data-target="#AddnewTicket" >
                   Add new Ticket </button>
            </div>
            <div class="col-md-6">
                @if (session('TicketAdded'))
                    <div class="alert alert-success">
                        {{ session('TicketAdded') }}
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
                    <th scope="col">Reason</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Expiration</th>
                    {{-- <th scope="col">#</th> --}}
                </tr>
            </thead>
            <tbody>

                @foreach ($Ticket as $ticket)
                <tr>
                    <td>{{$ticket->CodeName }} {{$ticket->Platenumber }}</td>
                    <td>{{$ticket->TypeName }}</td>
                    <td>{{$ticket->Amount }}</td>
                    <td>{{$ticket->ExpiryDate}} </td>
                    {{-- <td><img style="width:10vw;height:20vh;" src="/uploads/Recipe/{{$res->Image2 }}" /> </td> --}}
                    {{-- <td> <button id="reject" type="button" class="btn btn-danger"  onclick= "SendId('{{ $ticket->id  }}')" data-toggle="modal" data-target="#DeleteRes" >
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                    </td> --}}
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

<div id="AddnewTicket" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  action="AddNewTicket" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add New Ticket</h4>
                    <br>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>VehicleNo:</strong>
                                {{-- <input type="text" name="VehicleNo" class="form-control" placeholder="VehicleNo"> --}}
                                <select class="form-control selectpicker" id="VehicleNo" name="VehicleNo" data-live-search="true">
                                    @foreach($Vehicle as $c)
                                    <option value="{{ $c->id }}" data-tokens="{{ $c->Platenumber }}" >{{ $c->Platenumber }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Type:</strong>
                                <select class="form-control" name="TicketType" >
                                    @foreach($TicketType as $c)
                                    <option value="{{ $c->id }}" >{{ $c->TypeName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Amount:</strong>
                                <input type="text" name="Amount" class="form-control" placeholder="Amount">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Expiry Date:</strong>
                                <input type="date" name="ExpiryDate" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Reason:</strong>
                                <textarea  type="text" name="Reason" class="form-control" cols="20" rows="2" placeholder="Reason"> </textarea>

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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
@stop
