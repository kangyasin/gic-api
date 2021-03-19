@extends('template')
@section('title', 'Buat Contact')

    @php
      $uri_segment = request()->segment(2);
    @endphp

@section('content')

    <div class="row mt-4 mb-4">
        <div class="col">
            <h2>Buat Contact Baru</h2>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    <div class="row mt-4 mb-4">
        @if($uri_segment === 'daftar')
            <form action="{{url('/contacts/buat')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputName" value="{{ old('name') }}" aria-describedby="nameHelp" placeholder="Enter name" required="required">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label for="exampleInputPhone">Phone number</label>
                    <input type="text" class="form-control" name="phone" id="exampleInputPhone" value="{{ old('phone') }}" aria-describedby="phoneHelp" placeholder="Enter phone number">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @endif

            @if($uri_segment === 'edit')
                <form action="{{url('/contacts/ubah/'.$contact->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputName" value="{{ $contact->name }}" aria-describedby="nameHelp" placeholder="Enter name" required="required">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail" value="{{ $contact->email }}" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPhone">Phone number</label>
                        <input type="text" class="form-control" name="phone" id="exampleInputPhone" value="{{ $contact->phone }}" aria-describedby="phoneHelp" placeholder="Enter phone number">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            @endif
    </div>
    <div class="row">
        <a href="{{url('/contacts')}}" class="btn btn-success">Back</a>
    </div>

@endsection
