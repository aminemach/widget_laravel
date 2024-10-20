(function() {
    const scriptTag = document.querySelector('script[src*="currencyWidget.js"]');
    const redirectUrl = scriptTag.getAttribute('data-redirect-url');
    const btnActionClass = scriptTag.getAttribute('data-btn-action');
    const stickyIcon = document.createElement('div');
    stickyIcon.id = 'sticky-icon';
    stickyIcon.style.position = 'fixed';
    stickyIcon.style.bottom = '50%';
    stickyIcon.style.left = '0';
    stickyIcon.style.width = '50px';
    stickyIcon.style.height = '50px';
    stickyIcon.style.backgroundColor = '#FFFFFF'; 
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

    document.body.appendChild(stickyIcon);
    stickyIcon.addEventListener('click', function() {
        window.location.href = "C:/projects/templatemo_591_villa_agency/contact.html";
    });
    const exchangeRates = {
        USD: { EUR: 0.92, GBP: 0.76, JPY: 140.0 },
        EUR: { USD: 1.09, GBP: 0.82, JPY: 151.0 },
        GBP: { USD: 1.31, EUR: 1.22, JPY: 183.0 },
        JPY: { USD: 0.0071, EUR: 0.0066, GBP: 0.0054 }
    };
    const converterContainer = document.createElement('div');
    converterContainer.id = 'currency-converter';
    converterContainer.style.padding = '20px';
    converterContainer.style.border = '1px solid #ddd';
    converterContainer.style.width = '300px';
    converterContainer.style.backgroundColor = '#f9f9f9';
    converterContainer.style.borderRadius = '8px';
    converterContainer.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.1)';
    converterContainer.style.fontFamily = 'Arial, sans-serif';
    converterContainer.style.marginTop = '20px';
    converterContainer.innerHTML = `
      <h3 style="margin-bottom: 15px; font-size: 20px;">Currency Converter</h3>
      <div style="display: flex; align-items: center; margin-bottom: 10px;">
          <input type="number" id="amount" placeholder="Amount" style="flex: 1; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
      </div>
      <div style="margin-bottom: 10px;">
          <label for="fromCurrency" style="display: block; margin-bottom: 5px;">From:</label>
          <select id="fromCurrency" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
              <option value="USD">USD</option>
              <option value="EUR">EUR</option>
              <option value="GBP">GBP</option>
              <option value="JPY">JPY</option>
          </select>
      </div>
      <div style="margin-bottom: 10px;">
          <label for="toCurrency" style="display: block; margin-bottom: 5px;">To:</label>
          <select id="toCurrency" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
              <option value="USD">USD</option>
              <option value="EUR">EUR</option>
              <option value="GBP">GBP</option>
              <option value="JPY">JPY</option>
          </select>
      </div>
      <button id="convertBtn" style="padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">
          Convert
      </button>
      <p id="result" style="margin-top: 10px; font-weight: bold;"></p>
    `;

    const widgetDiv = document.getElementById('currency-widget');
    if (widgetDiv) {
        widgetDiv.appendChild(converterContainer);
    }

    const convertBtn = document.getElementById('convertBtn');
    convertBtn.classList.add(btnActionClass);

    convertBtn.addEventListener('click', function() {
        const amount = parseFloat(document.getElementById('amount').value);
        const fromCurrency = document.getElementById('fromCurrency').value;
        const toCurrency = document.getElementById('toCurrency').value;
        if (isNaN(amount) || amount <= 0) {
            document.getElementById('result').innerText = 'Please enter a valid amount.';
            return;
        }
        if (fromCurrency === toCurrency) {
            document.getElementById('result').innerText = 'Cannot convert the same currency.';
            return;
        }

        const rate = exchangeRates[fromCurrency][toCurrency];
        const convertedAmount = (amount * rate).toFixed(2);
        document.getElementById('result').innerText = `${amount} ${fromCurrency} = ${convertedAmount} ${toCurrency}`;
    });
})();
