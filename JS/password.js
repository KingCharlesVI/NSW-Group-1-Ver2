document.getElementById('passwordForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var password = document.getElementById('password').value;

    if (password === 'admin') { // Replace 'yourpassword' with your actual password
        window.location.href = '/other-pages/private.html'; // Redirect to the protected page
    } else {
        document.getElementById('error').textContent = 'Incorrect password. Please try again.';
    }
});