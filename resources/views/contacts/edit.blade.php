<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a class="btn btn-success" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a> === <a class="btn btn-success" href="{{ route('contacts.index') }}"> Contacts</a>
        </h2>
    </x-slot>




<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit Contact</h2><a class="btn btn-success" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a> === <a class="btn btn-success" href="{{ route('contacts.index') }}"> Contacts</a>
</div>
<div class="pull-right">

</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('contacts.update',$contact->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Contact Name:</strong>
<input type="text" name="name" value="{{ $contact->name }}" class="form-control" placeholder="Contact name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Contact Email:</strong>
<input type="email" name="email" class="form-control" placeholder="Contact Email" value="{{ $contact->email }}">
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Contact Phone:</strong>
<input type="text" name="phone" value="{{ $contact->phone }}" class="form-control" placeholder="Contact Phone">
@error('phone')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Contact Message:</strong>
<input type="text" name="message" value="{{ $contact->message }}" class="form-control" placeholder="Contact Message">
@error('message')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</div>
</x-app-layout>
