<?php
$content=
"<div class=\"container\" style=\"margin-top:30px\">
    <div class=\"row\">
        <div class=\"col-sm-4\">
            <h2>REGISTER</h2>
            <form method = \"post\" action = \"./dom.users/register.dom.php\">
                
                <div class=\"form-group\">
                    <label for=\"email\">Email:</label>
                    <input type=\"email\" class=\"form-control\" name=\"email\" id=\"email\"><br>
                </div>
                
                <div class=\"form-group\">
                        <label for=\"pwd\">Password:</label>
                        <input type=\"password\" class=\"form-control\" name=\"pw\" id=\"pwd\"><br>
                </div>
                
                <div class=\"form-group\">
                    <label for=\"pwd\">password validation:</label>
                    <input type=\"password\" class=\"form-control\" name=\"pwValidation\" id=\"pwValidation\"><br>
                </div>

                <button class=\"btn btn-success\" type=\"submit\">Login</button>
            </form>
        </div>
    </div>
</div>";
require_once __DIR__ . "/masterpage.php";
?>
