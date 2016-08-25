// Vue.use(VueRouter);

/*
|--------------------------------------------------------------------------
| Vue Routing
|--------------------------------------------------------------------------
| Using the default Vue Router for Views
| 
*/

// Define some components (main views)
var Step1 = Vue.extend({
    template: '<p>This is step one</p>'
})
var Step2 = Vue.extend({
    template: '<p>This is step two</p>'
})
var Step3 = Vue.extend({
    template: '<p>This is step three</p>'
})

// The router needs a root component to render.
var App = Vue.extend({})

// Create a router instance.
var router = new VueRouter()

// Define some routes.
router.map({
    '/step-one': {
        component: Step1
    },
    '/step-two': {
        component: Step2
    },
    '/step-three': {
        component: Step3
    }
})

// Start the app!
router.start(App, '#app')

new Vue({
  el: '#app',

  data: {
    price: 30,
  },

  // ready: function () {
  //   this.fetchEvents();
  // },

  computed: {
    total: function() {
        return this.price;
    }
  },

  methods: {

    // fetchEvents: function () {
    //   var events = [];
    //   // this.$set('events', events);
    //   this.$http.get('/api/events')
    //     .success(function (events) {
    //       this.$set('events', events);
    //       console.log(events);
    //     })
    //     .error(function (err) {
    //       console.log(err);
    //     });
    // }
  }
});