const CACHE_NAME = 'invoice-management-v1';
const urlsToCache = [
    '/css/custom.css',
    '/js/main.js',
    '/js/app.js',
    '/assets/images/logo.png',
];

self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                console.log('Opened cache');
                return cache.addAll(urlsToCache);
            })
    );
});

self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                if (response) {
                    return response;
                }
                return fetch(event.request);
            })
    );
});

self.addEventListener('fetch', event => {
    // Only serve cached responses for static assets
    if (event.request.url.includes('.css') || 
        event.request.url.includes('.js') || 
        event.request.url.includes('.png') || 
        event.request.url.includes('.jpg')) {
        event.respondWith(
            caches.match(event.request)
                .then(response => {
                    if (response) {
                        return response;
                    }
                    return fetch(event.request);
                })
        );
    } else {
        // For dynamic pages, always fetch from the server
        event.respondWith(fetch(event.request));
    }
});