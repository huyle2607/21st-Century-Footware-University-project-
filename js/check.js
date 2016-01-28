//Sign up check
function checkSignup()
    {
        var s=document.signup_form;
        if(s.address.value=='')
        {
            document.getElementById("address").style.borderColor = "#cc0000";
            document.getElementById("address_error").innerHTML="*Address must NOT be blank!";
            s.address.focus();
            return false;   
        }
        else
            document.getElementById("address_error").style.display = "none";
            
        if(s.phone.value=='')
        {
            document.getElementById("phone").style.borderColor = "#cc0000";
            document.getElementById("phone_error").innerHTML="*Phone must NOT be blank!";
            s.phone.focus();
            return false;   
        }
        else
            document.getElementById("phone_error").style.display = "none";
            
            
        if(isNaN(s.phone.value))
        {
            document.getElementById("phone").style.borderColor = "#cc0000";
            document.getElementById("phone_error_2").innerHTML = "*Phone numbers MUST be numbers";
            s.phone.focus();
            return false;   
        }
        else
            document.getElementById("phone_error").style.display = "none";
            
            
        if(s.email.value=='')
        {
            document.getElementById("email").style.borderColor = "#cc0000";
            document.getElementById("email_error").innerHTML="*Email must NOT be blank!";
            s.email.focus();
            return false;   
        }
        else
        {
            var email = document.getElementById('email');
             var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!filter.test(email.value)) {
                document.getElementById("email").style.borderColor = "#cc0000";
                document.getElementById("email_error").innerHTML="*Your email is NOT in correct form!";
                s.email.focus();
                return false;
             }
            else
            {
                document.getElementById("email_error").style.display = "none";  
            }
        }
            

            
            
                
            
        if(s.username.value=='')
        {
            document.getElementById("username").style.borderColor = "#cc0000";
            document.getElementById("username_error").innerHTML="*Username must NOT be blank!";
            s.username.focus();
            return false;   
        }
        else
            document.getElementById("username_error").style.display = "none";

    
        if(s.password.value=='')
        {
            document.getElementById("password").style.borderColor = "#cc0000";
            document.getElementById("password_error").innerHTML="*Password must NOT be blank!";
            s.password.focus();
            return false;   
        }
        else
            document.getElementById("password_error").style.display = "none";
            
        if(s.password_confirmation.value=='')
        {
            document.getElementById("password_confirmation").style.borderColor = "#cc0000";
            document.getElementById("passwordconfirmation_error").innerHTML="*Password confirmation must NOT be blank!";
            s.password_confirmation.focus();
            return false;   
        }
        else
            document.getElementById("passwordconfirmation_error").style.display = "none";

        
        if(s.password_confirmation.value!=s.password.value)
        {
            document.getElementById("password_confirmation").style.borderColor = "#cc0000";
            document.getElementById("passwordconfirmation_error_2").innerHTML="*Passwords do not match!";
            s.password_confirmation.focus();
            return false;   
        }
        else
            document.getElementById("passwordconfirmation_error_2").style.display = "none";
        return true;    
    }