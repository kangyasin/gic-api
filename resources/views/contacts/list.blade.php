@extends('template')
    @section('title', 'Contacts List')
    @section('content')
        <div class="row mt-4 mb-4">

            <div class="col">
                <h2>Contact List</h2>
            </div>
            <div class="col">
                <div class="float-right">
                <a href="{{url('/contacts/daftar')}}" class="btn btn-primary">Tambah Contact</a>
                </div>
            </div>

        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->phone}}</td>
                    <td><a href="{{url('/contacts/edit/'.$contact->id)}}" class="btn btn-warning">Edit</a> </td>
                    <td>
                        <form action="{{url('/contacts/hapus/'.$contact->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    @endsection
