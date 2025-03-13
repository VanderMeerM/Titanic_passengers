
@extends('CSS.app')

<body> 

<div class="container">

<div class="container-left">

<div class="formchecks">

<br>

<form action= {{ route('passengers.index') }} id='formCheckboxes' method= 'GET'>
 @csrf

<strong>Leeftijd<br></strong> 
<br>

  <select id='age_value' name='age_value'>
  <option selected disabled value=''> Kies optie </option>
  <option value='>'>Ouder dan </option>
  <option value='='>Exact </option>
  <option value='<'>Jonger dan </option>
  </select>;

<select id='age_number' name='age_number'>
  <option selected disabled> Kies leeftijd</option>

@foreach ($all_ages as $age=>$num)

<option value={{$num->age}}>{{$num->age}}</option>

@endforeach

 </select>
  <br>
  <br>



      
<form>
@csrf

<strong>Geslacht<br></strong>

<div>

@php

$genders = ["Male", "Female"];
$boarding_places = ["Belfast", "Cherbourg", "Queenstown", "Southampton"];
$classes = [1,2,3];
$statuses = ["Overleefd", "Omgekomen"];

@endphp

@foreach ($genders as $gender) 

<div>
  <input checked name= {{ $gender }} type="checkbox"/> {{ $gender }}
</div>

@endforeach

</div>

</form>

<form>
@csrf
<strong>Aan boord gegaan in<br></strong>

@foreach ($boarding_places as $bplace) 

<div>
  <input checked name="boarded[]" name= {{ $bplace }} type="checkbox"/> {{ $bplace }}
</div>

@endforeach

<br>
</form>

<form>
@csrf

<strong>Klasse<br></strong>

@foreach ($classes as $class) 

<div>
  <input checked name="class[]" name= {{ $class }} type="checkbox"/>{{ $class }}e
</div>

@endforeach

 <br>

 </form>

 <form>
 @csrf

<strong>Overleefd / omgekomen<br></strong>

@foreach ($statuses as $status) 

<div>
  <input checked name="survvict[]" name= {{ $status }} type="checkbox"/>{{ $status }}
</div>

@endforeach

<br>

</form>

<button class='inline' type="submit" id='btn-filter' name="apply">Pas toe</button>

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