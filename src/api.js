import axios from 'axios';

export default {
  submitApplication: (data) => axios.post('/backend/submit.php', data)
};  