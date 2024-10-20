// Ensure the widgetSDK object is defined
if (typeof window.widgetSDK === 'undefined') {
    window.widgetSDK = {}; // Initialize widgetSDK object
    console.log("widgetSDK created");
}

// Define the run method on widgetSDK
window.widgetSDK.run = function(config) {
    console.log("Running widget with config:", config);

    // Create the sticky icon using the widgetColor from the config
    createStickyIcon(config.widgetColor);
};

// Function to create the sticky icon
function createStickyIcon(widgetColor) {
    const stickyIcon = document.createElement('div');
    stickyIcon.id = 'sticky-icon';
    stickyIcon.style.position = 'fixed';
    stickyIcon.style.bottom = '50%';
    stickyIcon.style.left = '0';
    stickyIcon.style.width = '50px';
    stickyIcon.style.height = '50px';
    stickyIcon.style.backgroundColor = widgetColor; // Use widgetColor from the config
    stickyIcon.style.color = 'white';
    stickyIcon.style.display = 'flex';
    stickyIcon.style.alignItems = 'center';
    stickyIcon.style.justifyContent = 'center';
    stickyIcon.style.cursor = 'pointer';
    stickyIcon.style.boxShadow = '0 2px 5px rgba(0, 0, 0, 0.3)';
    stickyIcon.style.zIndex = '1000';
    stickyIcon.innerHTML = '<span style="font-size: 24px;">💱</span>';
    stickyIcon.style.borderTopLeftRadius = '0';
    stickyIcon.style.borderBottomLeftRadius = '0';
    stickyIcon.style.borderTopRightRadius = '50%';
    stickyIcon.style.borderBottomRightRadius = '50%';
    stickyIcon.setAttribute('aria-label', 'Open currency converter');
    document.body.appendChild(stickyIcon);
    stickyIcon.addEventListener('click', function() {
        const redirectUrl = document.querySelector('script[src*="currencyWidget.js"]').getAttribute('data-redirect-url');
        if (redirectUrl) {
            window.location.href = redirectUrl;
        } else {
            console.warn('Redirect URL not found.');
        }
    });
}

