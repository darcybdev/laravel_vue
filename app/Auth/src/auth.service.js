import axios from 'axios';

export default {

  login (username, password) {
    return axios.post('/api/auth/login', {
        username,
        password
      })
      .then(response => {
        const user = response.data;
        localStorage.setItem('user', JSON.stringify(user));
        return Promise.resolve(user);
      });
  },

  logout () {
    return axios.get('/api/auth/logout')
      .then(response => {
        localStorage.removeItem('user');
        return Promise.resolve(true);
      });
  },

  register (email, username, password) {
    return axios.post('/api/auth/register', {
        email,
        username,
        password
      })
      .then(response => {
        return Promise.resolve(true);
      });
  }

};
