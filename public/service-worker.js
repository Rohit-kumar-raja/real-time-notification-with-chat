// Listen for the "push" event
self.addEventListener('push', function(event) {
    console.log('[Service Worker] Push Notification received', event);
  
    // Parse data from the push notification
    const payload = event.data ? event.data.text() : 'no payload';
  
    // Customize notification options
    const options = {
      body: payload,
      icon: 'path/to/icon.png',
      badge: 'path/to/badge.png',
      // Other options like actions, vibrate, etc.
    };
  
    // Show the notification
    event.waitUntil(
      self.registration.showNotification('Your App Name', options)
    );
  });
  
  // Listen for clicks on the notification
  self.addEventListener('notificationclick', function(event) {
    console.log('[Service Worker] Notification clicked');
  
    // Close the notification
    event.notification.close();
  
    // Handle click event, for example, open a page
    event.waitUntil(
      clients.openWindow('https://example.com')
    );
  });
  