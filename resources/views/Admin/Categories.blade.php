
@extends('Admin/LayoutAdmin')


@section('content')

<div class="row">
    <div class="col-md-12 ">
        <div class="row">
            <div class="col-md-6">

                <button  type="button" class="btn btn-info"   data-toggle="modal" data-target="#AddnewCategory" >
                   Add new Category </button>
            </div>
            <div class="col-md-6">
                @if (session('CatAdded'))
                    <div class="alert alert-success">
                        {{ session('CatAdded') }}
                    </div>
                @endif
                @if (session('CatDeleted'))
                    <div class="alert alert-danger">
                        {{ session('CatDeleted') }}
                    </div>
                @endif
            </div>
        </div>
        <br><br>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $cat)
                <tr>
                    <td>{{$cat->id }}</td>
                    <td>{{$cat->CategoryName }}</td>
                    <td> <button id="reject" type="button" class="btn btn-danger"  onclick= "SendId('{{ $cat->id  }}')" data-toggle="modal" data-target="#DeleteCat" >
                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    function SendId(id) {
        document.getElementById("inputt").value = id;
    }
</script>
<!-- Modal -->
<div id="DeleteCat" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="deleteCat" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <br>
                    <input type="text" class="form-control" id="inputt" aria-describedby="text" name="Id"
                        readonly>
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Event?</p>
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

<div id="AddnewCategory" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  action="AddNewCat" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Add New Category</h4>
                    <br>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Category Name:</strong>
                                <input type="text" name="Name" class="form-control" placeholder="Title">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
