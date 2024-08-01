@extends('CSS.app')


<div> 

<div class="container_detail">

<a href=" {{ route('passengers.index') }}"
        id="name_detail">← Terug naar overzicht van passagiers</a>

<p> 
    <div id="name_detail">
{{ $passenger->Title }} {{ $passenger->Surname }} {{ $passenger->First_Names }} ({{ $passenger->Age }}) 

@if ($passenger->Survivor_S_or_Victim_V === 'V')

† 
@endif

</p>

<p>
Voer mee in klasse: {{$passenger->Class}}
<br>
Opgestapt in: {{$passenger->Boarded}}
</p>

@empty(! $passenger->Extra_information)

<i>---- <br>
{{ $passenger->Extra_information }}</i> 

@endempty

</div>
</div>
</div>

</body>

