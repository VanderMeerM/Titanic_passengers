<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
		integrity=
"sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
		crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Inlogpagina</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    @extends('CSS.login')

</head>

<body style="text-align: center; margin-top: 5%;">

  <main class="form-signin w-50 m-auto">


  <form method="post" action="">
    @csrf
     
    <h1 class="h3 mb-3 fw-normal" style="color:#900">Inlogpagina</h1>

    <p></p>

   <input type="hidden" name="pass_id" value="{{ request()->get('pass_id') }}">

    <div class="form-floating">
    <label for="floatingInput">E-mail</label>
    <input name="email" id="email" value= " {{ old('email') }}" type="email" class="form-control @error('email') red @enderror @error('error') red @enderror" id="floatingInput">
    </div>
   
    <x-email></x-email>

       <div class="form-floating mt-3">
       <label for="floatingPassword">Wachtwoord</label>
      <input name= 'password' type="password" class="form-control @error('password') red @enderror  @error('error') red @enderror" id="floatingPassword">
     </div>

    <x-nopassword></x-nopassword>

     <x-error> </x-error>
 
  
    <button type="submit" class="w-50 mt-5 btn btn-lg btn-primary">Inloggen</button>
   
  </form>

</main>


</body>
</html>