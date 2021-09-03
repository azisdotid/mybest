require('./bootstrap');

var Turbolinks = require("turbolinks")
Turbolinks.start()

import Vue from 'vue'
new Vue({
    el: '#app'
})

new Vue({
    el: '#app',
    data: {
        id: document.querySelector('meta[name="user_id"]').content,
search: '',
messages: [],
users: [],
form: {
    to_id: '',
    content: ''
},
isActive: null,
notif: 0
    },
    mounted() {
        // #mounted
    },
    methods: {
        // #methods
    },
    watch: {
        // #watch
    }
})