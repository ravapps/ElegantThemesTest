<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a class="btn btn-success" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a> === <a class="btn btn-success" href="{{ route('contacts.create') }}"> Create Contact</a>
        </h2>
    </x-slot>

@foreach ($contacts as $contact)
<script>
@if( $contact->wordpress_id )
  CheckInMyDB({{$contact->wordpress_id}},{{$contact->id}});
@endif
</script>
@endforeach
<script>

</script>
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
<td>{{ $contact->phone }}</td>
<td>
<form action="{{ route('contacts.destroy',$contact->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
@if( empty($contact->wordpress_id) )
<a class="btn btn-primary" href="#" onclick="ajaxMakeUser('{{ $contact->email }}','{{ $contact->email }}','{{ $contact->phone }}',{{ $contact->id }})">Create WordPress Account</a>
@endif
</td>

</tr>

@endforeach
</table>
{!! $contacts->links() !!}



</x-app-layout>
