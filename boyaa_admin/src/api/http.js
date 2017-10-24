/**
 * Created by TerrorbladeChen on 2017/10/24.
 */
import axios from 'axios'
// Add a response interceptor
axios.interceptors.response.use(function (response) {
  // Do something with response data
  if (response.status === 200) {
    if (response.data.ret !== 200) {
      console.error(response.data)
    }
  }
  return response
}, function (error) {
  return Promise.reject(error)
})

export default axios
