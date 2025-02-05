const CACHE_NAME = "clinic-pwa-v1";
const DYNAMIC_CACHE_NAME = "clinic-dynamic-v1";

const urlsToCache = [
    "/",
    "/css/style.css",
    "/js/app.js",
    "/images/logo.png"
];

// نصب Service Worker و کش کردن فایل‌های ثابت
self.addEventListener("install", event => {
    event.waitUntil(
        caches.open(CACHE_NAME).then(cache => {
            console.log("Caching static assets...");
            return cache.addAll(urlsToCache);
        }) .catch((err) => console.log(err)) //
    );
});

// فعال‌سازی و حذف کش‌های قدیمی
self.addEventListener("activate", event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cache => {
                    if (cache !== CACHE_NAME && cache !== DYNAMIC_CACHE_NAME) {
                        console.log("Deleting old cache:", cache);
                        return caches.delete(cache);
                    }
                })
            ).catch((err) => console.log(err)) //;
        })
    );
});

// کش پویا برای درخواست‌های API
self.addEventListener("fetch", event => {
    // اگر درخواست مربوط به API است
    if (event.request.url.includes("/api/")) {
        event.respondWith(
            fetch(event.request)
                .then(response => {
                    // ذخیره پاسخ در کش پویا
                    return caches.open(DYNAMIC_CACHE_NAME).then(cache => {
                        cache.put(event.request.url, response.clone());
                        return response;
                    });
                })
                .catch(() => caches.match(event.request)) // در آفلاین، داده کش شده را برگردان
        );
    } else {
        // کش کردن سایر درخواست‌ها
        event.respondWith(
            caches.match(event.request).then(response => {
                return response || fetch(event.request).then(networkResponse => {
                    return caches.open(DYNAMIC_CACHE_NAME).then(cache => {
                        cache.put(event.request.url, networkResponse.clone());
                        return networkResponse;
                    });
                }).catch((err) => console.log(err)) //;
            })
        );
    }
});
