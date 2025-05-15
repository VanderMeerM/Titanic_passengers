
@extends('CSS.app')

<script src="https://cdn.tailwindcss.com"></script>

<body> 

<div class="container">

<div class="container-left">

<div class="formchecks scroll-box">


<br>

@php $sel_cat = explode('/', $_SERVER["REQUEST_URI"])[1];
@endphp

<form action= {{ route(explode('?', $sel_cat)[0]. '.index') }} method= 'post'> <!-- action = {{ route('passengers.index') }} --> 
 @csrf

 <div>
<strong>Leeftijd<br></strong> 
<br>

<div class="flex items-stretch">
  
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

<x-gender> </x-gender>

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
<x-boarded> </x-boarded>

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
  value= "{{  $class['Class'] }}" name="class[]" name= {{ $class }} type="checkbox"/> {{ $class['Class'] }}
</div>

@endforeach

</div>

<x-class> </x-class>

<div>

<br>

<div class="flex items-stretch mb-2">
<strong>Nationaliteit<br></strong><img id="show_hide" class="w-12 h-auto ml-2" src="../hide.png">
</div>

<div id="show_hide_nat">

<input id="cb_select_all" class="mb-3" checked type="checkbox"> <i>(De)selecteer alles </i>


@foreach ($arr_nationalities_total as $key=>$value )

<div>
  <input 
  
  @php
  if ( is_null($nationalities_filtered) || 
  ($nationalities_filtered !=null) && (in_array($key, $nationalities_filtered))) { echo 'checked'; } 
  @endphp   
  
  value= "{{ $key }}" class="cb_nat" name="nationality[]" type="checkbox"/>
   {{ (array_key_exists($key, $arr_nationalities_total) ? $value : $key) }}
</div>

@endforeach

 <x-nationality> </x-nationality>
<br>
</div>
</div>



<div>

<script>
  let eye = false;
  const showHide = document.getElementById('show_hide');
  const showHideNat = document.getElementById('show_hide_nat');

  showHide.addEventListener('click', () => { 
      eye = !eye; 
      if (eye) {
        showHide.setAttribute('src', '../show.png');
        showHideNat.style.display = 'none';
      }
      else {
        showHide.setAttribute('src', '../hide.png');
        showHideNat.style.display = 'block';

      }
    })

  const checkboxAll = document.getElementById('cb_select_all');
  const checkboxNat = document.querySelectorAll('.cb_nat');

    checkboxAll.addEventListener('click', () => { 

      if (!checkboxAll.checked) {
      checkboxNat.forEach(function (cb) {
                cb.checked = this.checked;
            }, this)
          }
          else {
            checkboxNat.forEach(function (cb) {
                cb.checked = !this.checked;
            }, this)
          }
          
  })
   
  </script>
 
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

<x-survived> </x-survived>


<br>

</div>

<button class='inline' type="submit" id='btn-filter' name="apply">Filter</button>

</form>

<button id='btn-filter_red' onclick= "window.location.href = '{{ route('all.index') }}'" name="reset">Reset</button>

</div>

<div class='formname mt-4'> 

<strong>Zoek op een naam<p></strong>

<form method="GET" action = "{{ route('all.index') }}">
@csrf

<input class="input" type="text" name="name" placeholder="Voer naam in"
value=" {{ request('name') }}" class="input h-10">

<button id='btn-filter' type="submit" class='mt-2'>Zoek</button> 
</form>
</div>

</div>

<div class="main-container-right">

<div class="buttonbar">

<a href="/all" {{ request()->path() === 'all' ? 'style=text-decoration-line:underline' : null }} >Alle opvarenden </a>
<a href="/passengers" {{ request()->path() === 'passengers' ? 'style=text-decoration-line:underline' : null }} >Passagiers  </a>
 <a href="/crew" {{ request()->path() === 'crew' ? 'style=text-decoration-line:underline' : null }} >Bemanning  </a>

</div>


@auth
<a href="../logout">
 <img class='loginout' src="../logout.png"> 
</a>
@endauth


<div class="bar-top"> Aantal (obv filtering): {{ $passengers->count() }}</div>

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