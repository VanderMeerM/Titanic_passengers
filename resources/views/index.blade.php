
@extends('CSS.app')

<body> 

<div class="container">

<div class="container-left">

    <div class="formchecks">

    <form action='' id='formCheckboxes' method= 'get'>

<br>
<strong>Geslacht<br></strong>

<div>
<input checked type="checkbox"/>Man
</div>
<div>
<input checked type="checkbox"/>Vrouw
</div>
<br>
<strong>Leeftijd<br></strong> 
<br>
<strong>Aan boord gegaan in<br></strong>
<div>
<input checked type="checkbox"/>Belfast
</div>
<div>
<input checked type="checkbox"/>Cherbourg
</div>
<div>
<input checked type="checkbox"/>Queenstown
</div>
<div>
<input checked type="checkbox"/>Southampton
</div>
<br>

<strong>Klasse<br></strong>
<div>
<input checked type="checkbox"/>1e
</div>
<div>
<input checked type="checkbox"/>2e
</div>
<div>
<input checked type="checkbox"/>3e
</div>
 <br>
<strong>Overleefd / omgekomen<br></strong>
<div>
<input checked type="checkbox"/>Overleefd
</div>
<div>
<input checked type="checkbox"/>Omgekomen
</div>
<br>

<button class='inline' id='btn-filter' name="checkBtn">Pas toe</button>
<button id='btn-filter_red' name="reset">Reset</button>

<div class='formname'> 

<strong>Zoek op een naam<p></strong>

<form method="GET" action = "{{ route('passengers.index') }}" class="mb-4 flex items-center space-x-2">
<input class="input" type="text" name="passenger_name" placeholder="Voer naam in"
value="{{ request('First_Names') }}" class="input h-10">


<!--<input name='enteredName' id='input_name' placeholder='Voer naam in'> -->
<br>
<br>

<button id='btn-filter' class='margin_left' name='searchName'>Zoek</button> 

<hr>

</div>
</form>

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