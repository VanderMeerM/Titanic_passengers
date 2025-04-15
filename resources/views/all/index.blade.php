
@extends('CSS.app')


<body> 



<div class="container">

<div class="container-left">

<div class="formchecks scroll-box">

<br>

<form action= {{ route('all.index') }} method= 'get'> <!-- action = {{ route('passengers.index') }} --> 
 @csrf

 <div>
<strong>Leeftijd<br></strong> 
<br>

  <select id='age_value' name='age_value'>
  <option value=''> Kies optie </option>

  @foreach (\App\Models\Passenger::$age_values as $key=>$value)

  <option 
  
  @php 
  if ($age_value === $key) { echo 'selected'; }
  @endphp

  value= {{ $key }}> {{ $value }}</option>
  @endforeach

    </select>

<select id='age_number' name='age_number'>
  <option> Kies leeftijd</option>

@foreach ($all_ages as $age)

<option 

@php 
if ($age['Age'] == $age_number) { echo 'selected'; }
@endphp

value={{$age['Age']}}>{{$age['Age']}}</option>

@endforeach

 </select>

 </div>
 <br>
     
<div>
<strong>Geslacht<br></strong>

@foreach ($genders as $gender) 

<div>
  <input 
  
  @php 
  if ( is_null($gender_filtered) || 
  ($gender_filtered !=null) && (in_array($gender['Gender'], $gender_filtered))) { echo 'checked'; } 
  @endphp   
    
  value= {{  $gender['Gender'] }} name= "gender[]" type="checkbox"/> 
  {{ \App\Models\Passenger::$gender_label[$gender["Gender"]] }}
</div>

@endforeach

</div>
<br>

<div>
<strong>Aan boord gegaan in<br></strong>

@foreach ($embarked as $bplace) 

<div>
  <input 
  
  @php 
  if ( is_null($embarked_filtered) || 
  ($embarked_filtered !=null) && (in_array($bplace['Embarked'], $embarked_filtered))) { echo 'checked'; } 
  @endphp  
   value= "{{ $bplace['Embarked'] === '' ? "Onbekend" : $bplace['Embarked'] }}" name="boarded[]" type="checkbox"/> 
  {{ $bplace['Embarked'] === '' ? "Onbekend" : $bplace['Embarked'] }}
</div>

@endforeach

</div>
<br>

<div>
<strong>Klasse<br></strong>

@foreach ($classes as $class)

<div>
  <input 
  @php 
  if ( is_null($class_filtered) || 
  ($class_filtered !=null) && (in_array($class['Class'], $class_filtered))) { echo 'checked'; } 
   @endphp 
  value= "{{  $class['Class'] }}" name="class[]" name= {{ $class }} type="checkbox"/>{{ $class['Class'] }}
</div>

@endforeach

</div>

<div>

<br>

<strong>Nationaliteit<br></strong>

@foreach ($nationalities as $nat)

<div>
  <input 
  
  @php
  if ( is_null($nationalities_filtered) || 
  ($nationalities_filtered !=null) && (in_array($nat['Nationality'], $nationalities_filtered))) { echo 'checked'; } 
  @endphp   
  
  value= "{{ $nat['Nationality'] }}" name="nationality[]" name= {{ $nat }} type="checkbox"/>{{ $nat['Nationality'] }}
</div>

@endforeach

 <br>
</div>

<div>
 
<strong>Overleefd / omgekomen<br></strong>


@foreach ($statuses as $status) 

<div>
  <input 
  
  @php 
  if (is_null($survived_filtered) || 
  ($survived_filtered !=null) && (in_array($status['Survived'], $survived_filtered))) { echo 'checked'; } 
  @endphp   

  value= {{ $status['Survived'] }} name="survvict[]" type="checkbox"/> 
  {{ \App\Models\Passenger::$status_label[$status['Survived']] }} 
   
</div>

@endforeach

<br>

</div>

<button class='inline' type="submit" id='btn-filter' name="apply">Pas toe</button>

</form>

<button id='btn-filter_red' onclick= "window.location.href = '{{ route('all.index') }}'" name="reset">Reset</button>

</div>

<div class='formname'> 

<strong>Zoek op een naam<p></strong>

<form method="GET" action = "{{ route('all.index') }}" class="mb-4 flex items-center space-x-2">
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

<a href="{{ route('all.show', ['all' => $passenger->Id, 'classes'=> $classes ]) }}">
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