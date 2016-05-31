// Javascript for Login page

// validating username and password of all users


var username = document.getElementById('username').value;
var password = document.getElementById('password').value;
	function login_validate()
	{



		if (username.length == 0) {

  alert('Please enter the username');
  return;
		}

		if (password.length == 0) {

  alert('Please enter the username');
  return;
		}

	}