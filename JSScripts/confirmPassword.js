function verifyConfPassword(option) {
    let badge = document.getElementById('newPasswordIndicator');
    let password = document.getElementById('newPassword').value;
    let confirmedPassword = document.getElementById('confirmPassword').value;

    if(password.length === confirmedPassword.length && password !== confirmedPassword)
        badge.innerHTML = "<span class=\"badge bg-danger-soft\">Mots de passe différents.</span>";
    else if (password.length === confirmedPassword.length && password === confirmedPassword)
        badge.innerHTML = "<span class=\"badge bg-success-soft\">Mots de passe identiques.</span>";
    else
        badge.innerText = "";
}