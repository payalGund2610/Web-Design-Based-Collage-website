function validateLogin() {
  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;

  // Replace this with your logic to read from the text file and validate the credentials
  // For simplicity, using hardcoded values in this example
  if (username === 'shubham123@gmail.com' && password === '123') {
    window.location.href = 'MainPage.html'; // Redirect to the next page
  } else {
    alert('Invalid username or password');
  }
}
