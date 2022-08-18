Vue.use(VueLightGallery);

new Vue({
  el: '#app',
  data: function () {
    return {
      images: [
        {
          title: 'عکس 1',
          url: 'img/1.jpeg',
        },
        {
          title: 'عکس 2',
          url: 'img/2.jpeg',
        },
        {
          title: 'عکس 3',
          url: 'img/3.jpeg',
        },
        {
          title: 'عکس 4',
          url: 'img/4.jpeg',
        },
      ],
      index: null
    };
  },
});