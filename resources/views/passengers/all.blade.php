
@extends('CSS.app')


<body> 



<div class="container">

<div class="container-left">

<div class="formchecks scroll-box">

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
  </select>

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

@php 
$gender_label = array('Female' => 'Vrouw', 'Male' => 'Man', 'Unknown' => 'Onbekend');
@endphp

@foreach ($genders as $gender) 

<div>
  <input checked value= {{  $gender['Gender'] }} name= "gender[]" type="checkbox"/> 
  {{ $gender_label[$gender['Gender']]  }}
</div>

@endforeach

</div>
<br>

<div>
<strong>Aan boord gegaan in<br></strong>

@foreach ($embarked as $bplace) 

<div>
  <input checked value= "{{ $bplace['Embarked'] }}" name="boarded[]" type="checkbox"/> {{ $bplace['Embarked'] }}
</div>

@endforeach

</div>
<br>

<div>
<strong>Klasse<br></strong>

@foreach ($classes as $class)

<div>
  <input checked value= "{{  $class['Class'] }}" name="class[]" name= {{ $class }} type="checkbox"/>{{ $class['Class'] }}
</div>

@endforeach

</div>

<div>

<br>

<strong>Nationaliteit<br></strong>

@foreach ($nationalities as $nat)

<div>
  <input checked value= "{{ $nat['Nationality'] }}" name="nationality[]" name= {{ $nat }} type="checkbox"/>{{ $nat['Nationality'] }}
</div>

@endforeach

 <br>
</div>

<div>
 
<strong>Overleefd / omgekomen<br></strong>

@php 
$status_label = ['Saved' => 'Overleefd', 'Lost' => 'Omgekomen', '' => ''];
@endphp

@foreach ($statuses as $status) 

<div>
  <input checked value= {{ $status['Survived'] }} name="survvict[]" type="checkbox"/> 
  {{ $status_label[$status['Survived']] }} 
   
</div>

@endforeach

<br>

</div>

<button class='inline' type="submit" id='btn-filter' name="apply">Pas toe</button>

</form>

<button id='btn-filter_red' onclick= "window.location.href = '{{ route('passengers.index') }}'" name="reset">Reset</button>

</div>

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


<div class="main-container-right">

<div class="buttonbar">

  <a href="/all">Alle opvarenden </a>
  <a href="/passengers">Passagiers  </a>
  <a href="/crew">Bemanning  </a>

</div>

<div class="bar-top"> Aantal personen: {{ $passengers->count() }}</div>

<div class="container-right">

@foreach($passengers as $passenger) 

<div id="name-person">

<a href="{{ route('passengers.show', ['passenger' => $passenger->Id, 'classes'=> $classes ]) }}">
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