

{{-- @isset--}}

<a>
    @section('content')


{{-- @if(count($tasks)) --}} 

@forelse ($passengers as $pas) 
<div>
{{-- {{ $task->title }} --}} 

<a href="{{ route('passengers.show', ['passenger' => $pas->id]) }}"
 ></a>
</div>


@empty
<div>
There are no tasks!
</div>
@endforelse

@if ($tasks->count())

<nav class="mt-4">

{{ $tasks->links() }}

</nav>
@endif

@endsection

{{--@endif --}} 
</div>