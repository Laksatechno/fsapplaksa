// /////////////////////////////////////////////////////////////////////////////
// // You can find dozens of practical, detailed, and working examples of 
// // service worker usage on https://github.com/mozilla/serviceworker-cookbook
// /////////////////////////////////////////////////////////////////////////////

// // Cache name
// var CACHE_NAME = 'cache-version-1'; // Updated version number


// // Files required to make this app work offline
// var REQUIRED_FILES = [
//   './index.php',
//   './home',
//   '/bahanmentah',
//   'https://fonts.googleapis.com/css?family=Inter:400,500,700&display=swap',
//   'asset/js/lib/jquery-3.4.1.min.js',
//   'asset/js/lib/popper.min.js',
//   'asset/js/lib/bootstrap.min.js',
//   'asset/js/plugins/owl-carousel/owl.carousel.min.js',
//   'asset/js/base.js',
//   'https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css',    
//   'https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css ',
//   'https://cdn.datatables.net/1.13.1/css/dataTables.material.min.css ',

//   // 'assets/js/base.js',
//   // 'asset/css/inc/owl-carousel/owl.carousel.min.css',
//   // 'asset/css/inc/owl-carousel/owl.theme.default.css',
//   // 'asset/css/inc/bootstrap/bootstrap.min.css',
//   'asset/css/style.css',
//   'asset/img/avatar.png',
//   'assets/images/icon.png',
//   'assets/images/logo_ptlmi.png',
//   'assets/css/style.css'
// ];

// self.addEventListener('install', function(event) {
//   event.waitUntil(
//     caches.open(CACHE_NAME)
//       .then(function(cache) {
//         return cache.addAll(REQUIRED_FILES);
//       })
//       .then(function() {
//         return self.skipWaiting();
//       })
//   );
// });






// self.addEventListener('activate', function(event) {
//   // Calling claim() to force a "controllerchange" event on navigator.serviceWorker
//   event.waitUntil(self.clients.claim());
// });

// Installing service worker
const CACHE_NAME = 'pwa-yofalab';

/* Add relative URL of all the static content you want to store in
 * cache storage (this will help us use our app offline)*/
let resourcesToCache = ["asset/js/base.js", "asset/css/style.css"];

self.addEventListener("install", e => {
    e.waitUntil(
        caches.open(CACHE_NAME).then(cache => {
            return cache.addAll(resourcesToCache);
        }).then(self.skipWaiting())
    );
});



// Cache and return requests
self.addEventListener('fetch', function (event) {
    event.respondWith(
        fetch(event.request)
            .catch(() => {
                return caches.open(CACHE_NAME)
                    .then((cache) => {
                        return cache.match(event.request)
                    })
            })
    )
})

// Update a service worker
const cacheWhitelist = [CACHE_NAME];
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName => {
                    if (cacheWhitelist.indexOf(cacheName) === -1) {
                        return caches.delete(cacheName);
                    }
                })
            );
        }).then(() => self.clients.claim())
    );
});
