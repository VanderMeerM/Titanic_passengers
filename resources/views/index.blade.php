
@extends('CSS.app')

<body> 

<div class="container">

<div class="main-container-left">
    <div class="formchecks">

    </div>
</div>

<div class="main-container-right">

<div class="bar-top"> Aantal personen: {{ $passengers->count() }}</div>
<div class='container-right'>


@foreach( $passengers as $ap) 

<div id="name-person">

<a href="{{ route('passengers.show', ['passenger' => $ap->___id	]) }}">
 {{ $ap->Title }} {{ $ap->Surname }} {{ $ap->First_Names }} ({{ $ap->Age }}) 

 @if ($ap->Survivor_S_or_Victim_V === 'V')

  † 
 @endif
</a>
</div>

@endforeach 

</div>
</div>
</div>

</body>