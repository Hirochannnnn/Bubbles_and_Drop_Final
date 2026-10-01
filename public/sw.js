// Minimal service worker: just enough to let browsers offer "Add to Home Screen".
// It doesn't cache anything yet, so the site always loads fresh from the server.
self.addEventListener('install', () => self.skipWaiting());
self.addEventListener('activate', () => self.clients.claim());
self.addEventListener('fetch', () => {}); // presence of a fetch handler is required by some browsers
