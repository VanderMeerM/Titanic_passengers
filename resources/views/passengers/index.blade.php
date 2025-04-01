
@extends('CSS.app')

<body> 

<div class="container">

<div class="container-left">

<div class="formchecks">

<br>

<form action= {{ route('passengers.index') }} method= 'get'> <!-- action = {{ route('passengers.index') }} --> 
 @csrf

 <div>
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

@foreach ($all_ages as $age)

<option value={{$age['Age']}}>{{$age['Age']}}</option>

@endforeach

 </select>

 </div>
 <br>
     
<div>
<strong>Geslacht<br></strong>

@foreach (\App\Models\Passenger::$genders as $gender) 

<div>
  <input checked value= {{  $gender }} name= "gender[]" type="checkbox"/> {{ $gender === 'Male' ? 'Man' : 'Vrouw' }}
</div>

@endforeach

</div>

<div>
<strong>Aan boord gegaan in<br></strong>

@foreach (\App\Models\Passenger::$embarked as $bplace) 

<div>
  <input checked value= {{ $bplace }} name="boarded[]" type="checkbox"/> {{ $bplace }}
</div>

@endforeach

</div>
<br>

<div>
<strong>Klasse<br></strong>

@php 
$classes = \App\Models\Passenger::select('Class')->distinct()-> orderBy('Class', 'ASC')->get(); 
@endphp


@foreach ($classes as $class)

<div>
  <input checked value= {{  $class }} name="class[]" name= {{ $class }} type="checkbox"/>{{ $class['Class'] }}
</div>

@endforeach

 <br>
</div>

<div>

<strong>Overleefd / omgekomen<br></strong>

@foreach (\App\Models\Passenger::$statuses as $status) 

<div>
  <input checked value= {{ $status }} name="survvict[]" type="checkbox"/>{{ $status === 'Saved' ? 'Overleefd' : 'Omgekomen' }}
</div>

@endforeach

<br>

</div>

<button class='inline' type="submit" id='btn-filter' name="apply">Pas toe</button>

</form>

<button id='btn-filter_red' onclick= "window.location.href = '{{ route('passengers.index') }}'" name="reset">Reset</button>

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

<a href="{{ route('passengers.show', ['passenger' => $passenger->Id	]) }}">
 {{ $passenger->Name }} ({{ $passenger->Age }}) 

 @if ($passenger->Survived === 'Lost')

  † 
 @endif
</a>
</div>

@endforeach 

</div>
</div>
</div>

</body>