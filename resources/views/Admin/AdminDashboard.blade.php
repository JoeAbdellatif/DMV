
@extends('Admin/LayoutAdmin')


@section('content')
<p>Here are the list of people contact us.</p>
<table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>DateTime</th>
      </tr>
    </thead>
    <tbody>
        @foreach($Contact as $t)
            <tr>
                <td> {{ $t->name}} </td>
                <td> {{ $t->email}}</td>
                <td> {{ $t->subject}}</td>
                <td> {{ $t->message}}</td>
                <td> {{ $t->created_at}}</td>
            </tr>
        @endforeach

    </tbody>
  </table>
@stop
