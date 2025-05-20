

<form action= {{  route('user.update') }} method="post">
 @csrf

 {{  $user->name }} 
 <br>
<button type="submit">Update Wachtwoord
</button>
    
</form>
