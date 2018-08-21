
const authService = {
  login,
  logout,
  register
};

function login(username, password) {
  return fetch('/api/auth/login', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      username,
      password
    })
  })
  .then(handleResponse)
  .then(user => {
    localStorage.setItem('user', JSON.stringify(user));
    console.log('success login', user);
    return user;
  });
}

function logout() {
  return fetch('/api/auth/logout', {
    method: 'GET'
  })
  .then(handleResponse)
  .then(response => {
    localStorage.removeItem('user');
    return response;
  });
}

function register() {

}

function handleResponse(response) {
  console.log('response', response);
  return response.text().then(text => {
    const data = text && JSON.parse(text);
    if (!response.ok) {
      if (response.status === 401) {
        // Auto logout if 401 response from api
        // @todo: Popup login to continue
        logout();
        location.reload(true);
      }

      const error = (data && data.message) || response.statusText;
      return Promise.reject(error);
    }
    return data;
  });
}

export default authService;
