<div id="loginDiv">
    <form action="/login" method="POST">
        <input type="number" name="employeeNr" required placeholder="Medewerker Nummer" min="1"><br>
        <input type="password" name="password" required placeholder="Wachtwoord"><br>
        <input type="submit" value="inloggen"><br>
    </form>
</div>
<!-- Error message -->
<!-- <?php
    if(isset($_SESSION['login_error'])){
        echo("<div class='errorMessage'>".$_SESSION['login_error']."</div>");
    }
?> -->