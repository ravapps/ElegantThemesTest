<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a class="btn btn-success" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a> === <a class="btn btn-success" href="{{ route('contacts.create') }}"> Create Contact</a>
        </h2>
    </x-slot>



<div class="pull-right mb-2">

</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>S.No</th>
<th>Contact Name</th>
<th>Contact Email</th>
<th>Contact Phone</th>
<th width="280px">Action</th>
</tr>
@foreach ($contacts as $contact)
<tr>
<td>{{ $contact->id }}</td>
<td>{{ $contact->name }}</td>
<td>{{ $contact->email }}</td>
<td>{{ $contact->address }}</td>
<td>
<form action="{{ route('contacts.destroy',$contact->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $contacts->links() !!}
</x-app-layout>
