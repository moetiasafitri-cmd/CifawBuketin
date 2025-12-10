// ------------------------------------------
// AXIOS
// ------------------------------------------
import axios from 'axios';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// ------------------------------------------
// BOOSTRAP + POPPER
// ------------------------------------------

// Popper wajib untuk Tooltip, Dropdown, Popover di Bootstrap
import * as Popper from '@popperjs/core';
window.Popper = Popper;

// Import Bootstrap JS
import 'bootstrap';
