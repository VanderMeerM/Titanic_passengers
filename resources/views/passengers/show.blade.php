@extends('CSS.app')


<div> 

<div class="container_detail">

<a href=" {{ route('passengers.index') }}"
        id="name_detail">← Terug naar overzicht van passagiers</a>

<p> 

@if ($passenger->Image !=null)

<img src="../images/{{$passenger->Image}}">

@endif

    <div id="name_detail">
{{ $passenger->Title }} {{ $passenger->Surname }} {{ $passenger->First_Names }} ({{ $passenger->Age }}) 

@if ($passenger->Survivor_S_or_Victim_V === 'V')

† 
@endif

</p>

Voer mee in {{ $passenger->Class[0] }}e klasse. 
<br>
Opgestapt in: {{$passenger->Boarded}}
<p>
@empty(! $passenger->Extra_information)

<i>---- <br>
{{ $passenger->Extra_information }}</i> 

@endempty

</div>
</div>
</div>

</body>

