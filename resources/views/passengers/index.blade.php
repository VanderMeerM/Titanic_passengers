
@extends('CSS.app')

<body> 

<div class="container">

<div class="container-left">

<div class="formchecks">

<form action= {{ route('passengers.index') }} id='formCheckboxes' method= 'GET'>
 @csrf

<br>
        
<strong>Geslacht<br></strong>

<div>
<input checked name="gender[]" name="Male" type="checkbox"/>Man
</div>
<div>
<input checked name="gender[]" name="Female" type="checkbox"/>Vrouw
</div>

<br>
<strong>Leeftijd<br></strong> 
<br>
<strong>Aan boord gegaan in<br></strong>
<div>
<input checked name="boarded[]" name="Belfast" type="checkbox"/>Belfast
</div>
<div>
<input checked name="boarded[]" name="Cherbourg" type="checkbox"/>Cherbourg
</div>
<div>
<input checked name="boarded[]" name="Queenstown" type="checkbox"/>Queenstown
</div>
<div>
<input checked name="boarded[]" name="Southampton" type="checkbox"/>Southampton
</div>
<br>

<strong>Klasse<br></strong>
<div>
<input checked name="class[]" name="1st" type="checkbox"/>1e
</div>
<div>
<input checked name="class[]" name="2nd" type="checkbox"/>2e
</div>
<div>
<input checked name="class[]" name="3rd" type="checkbox"/>3e
</div>
 <br>
<strong>Overleefd / omgekomen<br></strong>
<div>
<input checked name="survvict[]" name="S" type="checkbox"/>Overleefd
</div>
<div>
<input checked name="survvict[]" name="V" type="checkbox"/>Omgekomen
</div>
<br>

<button class='inline' type="submit" id='btn-filter' name="checkBtn">Pas toe</button>

</form>

<button id='btn-filter_red' onclick ="{{ route('passengers.index') }}" name="reset">Reset</button>

<div class='formname'> 

<strong>Zoek op een naam<p></strong>

<form method="GET" action = "{{ route('passengers.index') }}" class="mb-4 flex items-center space-x-2">
@csrf

<input class="input" type="text" name="name" placeholder="Voer naam in"
value=" {{ request('name') }}" class="input h-10">

<p>

<button id='btn-filter' type="submit" class='margin_left'>Zoek</button> 

<hr>

</div>
</form>

</div>
</div>

<div class="main-container-right">

<div class="bar-top"> Aantal personen: {{ $passengers->count() }}</div>

<div class="container-right">

@foreach($passengers as $passenger) 

<div id="name-person">

<a href="{{ route('passengers.show', ['passenger' => $passenger->___id	]) }}">
 {{ $passenger->Title }} {{ $passenger->Surname }} {{ $passenger->First_Names }} ({{ $passenger->Age }}) 

 @if ($passenger->Survivor_S_or_Victim_V === 'V')

  † 
 @endif
</a>
</div>

@endforeach 

</div>
</div>
</div>

</body>