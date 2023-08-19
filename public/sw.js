const preLoad = function () {
    return caches.open("offline").then(function (cache) {
        // caching index and important routes
        return cache.addAll(filesToCache);
    });
};

self.addEventListener("install", function (event) {
    event.waitUntil(preLoad());
});

const filesToCache = [
    '/',
    '/offline.html',
    '/css/adminlte.min.css',
    '/css/fontawesome.min.css',
    '/css/icheck-bootstrap.min.css',
    '/js/adminlte.min.js',
    '/js/bootstrap.js',
    '/frontend/index.html',
    '/frontend/css/aos.css',
    '/frontend/css/bootstrap-datepicker.css',
    '/frontend/css/bootstrap.min.css',
    '/frontend/css/bootstrap.min.css.map',
    '/frontend/css/jquery-ui.css',
    '/frontend/css/jquery.fancybox.min.css',
    '/frontend/css/magnific-popup.css',
    '/frontend/css/mediaelementplayer.css',
    '/frontend/css/owl.carousel.min.css',
    '/frontend/css/owl.theme.default.min.css',
    '/frontend/css/style.css',
    '/frontend/css/bootstrap/bootstrap-grid.css',
    '/frontend/css/bootstrap/bootstrap-reboot.css',
    '/frontend/css/bootstrap/bootstrap.css',
    '/frontend/images/hero_new_3.jpg',
    '/frontend/images/feature_01.png'

];

const checkResponse = function (request) {
    return new Promise(function (fulfill, reject) {
        fetch(request).then(function (response) {
            if (response.status !== 404) {
                fulfill(response);
            } else {
                reject();
            }
        }, reject);
    });
};

const addToCache = function (request) {
    return caches.open("offline").then(function (cache) {
        return fetch(request).then(function (response) {
            return cache.put(request, response);
        });
    });
};

const returnFromCache = function (request) {
    return caches.open("offline").then(function (cache) {
        return cache.match(request, {ignoreVary: true}).then(function (matching) {
            if (!matching || matching.status === 404) {
                return cache.match("offline.html");
            } else {
                return matching;
            }
        });
    });
};

self.addEventListener("fetch", function (event) {
    event.respondWith(checkResponse(event.request).catch(function () {
        return returnFromCache(event.request);
    }));
    if(!event.request.url.startsWith('http')){
        event.waitUntil(addToCache(event.request));
    }
});
