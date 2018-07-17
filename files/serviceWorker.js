const cacheName = 'v1';
const cacheFiles = [
    './',
    'css/bootstrap/bootstrap.min.css',
    'css/style.css',
    'images/dice.png',
    'javascript/bootstrap/jquery-3.2.1.min.js',
    'javascript/bootstrap/bootstrap.min.js',
    'javascript/script.js',
    'api/conversion_chart.php',
    'images/Casinos_white.png',
    'images/Casinoscopy2.png',
    'images/cross.png',
    'images/Layer_124_small.png',
    'images/Layer_125.png',
    'images/legacy_table.png'
]

self.addEventListener('install', e => {
    console.log('[service Worker] installed')

    e.waitUntil(
        caches.open(cacheName)
            .then(cache => {
                console.log('[service Worker] caching')
                return cache.addAll(cacheFiles)
            })
    )
})

self.addEventListener('activate', e => {
    console.log('[service Worker] activate')

    e.waitUntil(
        caches.keys().then( cachenames => {
            return Promise.all(cachenames.map( thisCacheName =>{
                if(thisCacheName !== cacheName){
                    console.log('[service Worker] Removing Cached files from', thisCacheName)
                    return caches.delete(thisCacheName)
                }
            }))
        })
    )
})

self.addEventListener('fetch', e => {
    console.log('[service Worker] fetch', e.request.url)

    e.respondWith(

        caches.match(e.request)
            .then( response => {

                if(response){

                    console.log('[service Wroker] Found in cache', e.request.url)
                    return response

                } else {

                    let requestClone = e.request.clone()
                    return fetch(requestClone)
                        .then( response => {

                            if( !response || response.status !== 200 || response.type !== 'basic'){
                                console.warn('[service Worker] No response from fetch')
                                return response;
                            } else {

                                let responseClone = e.request.clone()
                                caches.open( cacheName )
                                    .then( cache => {

                                        cache.put(e.request, responseClone)

                                    })
                                return response;

                            }
                        })
                        .catch(err => {
                            console.warn('[service Worker] Error Feching & caching new fetch', err)
                        })
                }
            })
    )
})