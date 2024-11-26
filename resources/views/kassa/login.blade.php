<div id="loginDiv">
    <form action="/login" method="POST">
        @csrf
        <input type="number" name="id" required placeholder="Medewerker Nummer" min="1"><br>
        @error('id')
            <p class="text-xs text-red-900 font-semibold mt-1">{{$message}}</p>
            @enderror
        <input type="password" name="password" required placeholder="Wachtwoord"><br>
        @error('password')
            <p class="text-xs text-red-900 font-semibold mt-1">{{$message}}</p>
            @enderror
        <input type="submit" value="inloggen"><br>
    </form>
</div>
<!-- Error message -->
<!-- <?php
    if(isset($_SESSION['login_error'])){
        echo("<div class='errorMessage'>".$_SESSION['login_error']."</div>");
    }
?> -->