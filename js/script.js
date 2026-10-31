(function () {
  'use strict';

  var dlg = document.getElementById('quote');
  var form = document.getElementById('quote-form');
  var st = document.getElementById('form-status');
  var pageForm = document.getElementById('page-contact-form');
  var pageSt = document.getElementById('page-form-status');

  // Open quote modal with optional prefilled parameters
  function openQuoteModal(serviceName, estimatedCost, prefillDetails) {
    if (!dlg) return;
    if (form) {
      if (serviceName && form.service) {
        for (var i = 0; i < form.service.options.length; i++) {
          if (form.service.options[i].text.toLowerCase().indexOf(serviceName.toLowerCase()) !== -1) {
            form.service.selectedIndex = i;
            break;
          }
        }
      }
      if (estimatedCost) {
        var estField = document.getElementById('modal-estimated-cost');
        if (estField) estField.value = estimatedCost;
      }
      if (prefillDetails && form.details) {
        if (!form.details.value || form.details.value.trim() === '') {
          form.details.value = prefillDetails;
        }
      }
      if (st) {
        st.textContent = '';
        st.className = '';
      }
    }
    if (typeof dlg.showModal === 'function') {
      dlg.showModal();
    } else {
      dlg.setAttribute('open', '');
    }
    if (form && form.name) {
      setTimeout(function () { form.name.focus(); }, 100);
    }
  }

  // Close modal helper
  function closeModal() {
    if (!dlg) return;
    if (typeof dlg.close === 'function') {
      dlg.close();
    } else {
      dlg.removeAttribute('open');
    }
  }

  // Global click delegator
  document.addEventListener('click', function (e) {
    var q = e.target.closest('[data-quote]');
    if (q) {
      e.preventDefault();
      var svc = q.getAttribute('data-quote') || '';
      openQuoteModal(svc);
      return;
    }

    if (e.target.closest('[data-close]') || e.target === dlg) {
      closeModal();
      return;
    }

    // Modal WhatsApp Send
    if (e.target.closest('[data-wa-form]')) {
      if (!form) return;
      var f = new FormData(form);
      var text = 'Hello Excellent Cleaning Ltd, I would like a quote for cleaning services.\n\n' +
        '• Name: ' + (f.get('name') || 'Not provided') + '\n' +
        '• Phone: ' + (f.get('phone') || 'Not provided') + '\n' +
        '• Service: ' + (f.get('service') || 'General cleaning') + '\n' +
        '• Postcode/Area: ' + (f.get('postcode') || 'Not provided') + '\n' +
        (f.get('preferred_date') ? ('• Preferred Date: ' + f.get('preferred_date') + '\n') : '') +
        (f.get('estimated_cost') ? ('• Estimated Scope: ' + f.get('estimated_cost') + '\n') : '') +
        '• Details: ' + (f.get('details') || 'Please provide quotation');
      
      var waNumber = (window.ECL && window.ECL.wa) ? window.ECL.wa : '447597409836';
      window.open('https://wa.me/' + waNumber + '?text=' + encodeURIComponent(text), '_blank', 'noopener');
      return;
    }

    // Burger menu toggle
    var b = e.target.closest('[data-burger]');
    if (b) {
      var n = document.getElementById('menu');
      if (n) {
        var isOpen = n.classList.toggle('open');
        b.setAttribute('aria-expanded', isOpen);
      }
      return;
    }

    // Close menu when clicking nav link on mobile
    if (e.target.closest('#menu a')) {
      var n2 = document.getElementById('menu');
      var b2 = document.querySelector('[data-burger]');
      if (n2 && n2.classList.contains('open')) {
        n2.classList.remove('open');
        if (b2) b2.setAttribute('aria-expanded', 'false');
      }
    }
  });

  // Modal Quote Form Submission via Fetch
  if (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      if (!form.checkValidity()) {
        if (st) {
          st.className = 'err';
          st.textContent = 'Please complete all required fields with valid details.';
        }
        form.reportValidity();
        return;
      }

      var btn = form.querySelector('[type=submit]');
      if (btn) btn.disabled = true;
      if (st) {
        st.className = 'loading';
        st.textContent = 'Submitting your quote request...';
      }

      fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        headers: { 'Accept': 'application/json' }
      })
      .then(function (r) { return r.json(); })
      .then(function (data) {
        if (st) {
          st.className = data.ok ? 'ok' : 'err';
          st.textContent = data.message;
        }
        if (data.ok) {
          form.reset();
          setTimeout(function () {
            closeModal();
          }, 3000);
        }
      })
      .catch(function () {
        if (st) {
          st.className = 'err';
          st.textContent = 'Unable to send request online. Please chat with us on WhatsApp or call us directly.';
        }
      })
      .finally(function () {
        if (btn) btn.disabled = false;
      });
    });
  }

  // On-page Contact Form Submission
  if (pageForm) {
    pageForm.addEventListener('submit', function (e) {
      e.preventDefault();
      if (!pageForm.checkValidity()) {
        if (pageSt) {
          pageSt.className = 'err';
          pageSt.textContent = 'Please complete all required fields with valid details.';
        }
        pageForm.reportValidity();
        return;
      }

      var btn = pageForm.querySelector('[type=submit]');
      if (btn) btn.disabled = true;
      if (pageSt) {
        pageSt.className = 'loading';
        pageSt.textContent = 'Sending your request...';
      }

      fetch(pageForm.action, {
        method: 'POST',
        body: new FormData(pageForm),
        headers: { 'Accept': 'application/json' }
      })
      .then(function (r) { return r.json(); })
      .then(function (data) {
        if (pageSt) {
          pageSt.className = data.ok ? 'ok' : 'err';
          pageSt.textContent = data.message;
        }
        if (data.ok) {
          pageForm.reset();
        }
      })
      .catch(function () {
        if (pageSt) {
          pageSt.className = 'err';
          pageSt.textContent = 'Could not submit online. Please call or message us on WhatsApp.';
        }
      })
      .finally(function () {
        if (btn) btn.disabled = false;
      });
    });
  }

  // Interactive Estimate Calculator
  var calcBox = document.getElementById('estimator');
  if (calcBox) {
    var state = {
      service: 'domestic',
      serviceName: 'Residential Cleaning',
      base: 54,
      rate: 18,
      size: '1-2 Bed',
      factor: 1.0,
      addonsTotal: 0,
      addonsList: []
    };

    var displayPrice = document.getElementById('calc-display-price');
    var displaySub = document.getElementById('calc-display-sub');
    var bookBtn = document.getElementById('calc-book-btn');

    function updateCalc() {
      var low = Math.round((state.base * state.factor) + state.addonsTotal);
      var high = Math.round(low * 1.25);
      
      var priceText = '£' + low + ' – £' + high;
      if (state.service === 'domestic' && state.addonsTotal === 0) {
        priceText = '£' + low + ' – £' + (low + 18);
      }
      
      if (displayPrice) {
        displayPrice.textContent = priceText;
      }
      if (displaySub) {
        var addonStr = state.addonsList.length ? ' + ' + state.addonsList.join(', ') : '';
        displaySub.textContent = state.serviceName + ' for ' + state.size + addonStr;
      }
    }

    // Option buttons
    calcBox.addEventListener('click', function (e) {
      var btn = e.target.closest('.calc-btn');
      if (!btn) return;
      var group = btn.closest('[data-calc-group]');
      if (!group) return;

      var groupType = group.getAttribute('data-calc-group');
      group.querySelectorAll('.calc-btn').forEach(function (b) { b.classList.remove('active'); });
      btn.classList.add('active');

      if (groupType === 'service') {
        state.service = btn.getAttribute('data-service');
        state.base = parseFloat(btn.getAttribute('data-base')) || 54;
        state.rate = parseFloat(btn.getAttribute('data-rate')) || 18;
        if (state.service === 'domestic') state.serviceName = 'Residential Cleaning';
        else if (state.service === 'deep') state.serviceName = 'Deep Cleaning & Sanitisation';
        else if (state.service === 'tenancy') state.serviceName = 'Move-In & End of Tenancy Cleaning';
        else if (state.service === 'office') state.serviceName = 'Office & Commercial Cleaning';
      } else if (groupType === 'size') {
        state.size = btn.getAttribute('data-size') || '1-2 Bed';
        state.factor = parseFloat(btn.getAttribute('data-factor')) || 1.0;
      }

      updateCalc();
    });

    // Addon checkboxes
    calcBox.querySelectorAll('.addon-chk input').forEach(function (chk) {
      chk.addEventListener('change', function () {
        var sum = 0;
        var names = [];
        calcBox.querySelectorAll('.addon-chk input:checked').forEach(function (c) {
          sum += parseFloat(c.value) || 0;
          var labelEl = c.closest('.addon-chk').querySelector('b');
          if (labelEl) names.push(labelEl.textContent);
        });
        state.addonsTotal = sum;
        state.addonsList = names;
        updateCalc();
      });
    });

    if (bookBtn) {
      bookBtn.addEventListener('click', function () {
        var low = Math.round((state.base * state.factor) + state.addonsTotal);
        var high = Math.round(low * 1.25);
        var estStr = '£' + low + ' – £' + high + ' (' + state.size + ')';
        var detailsMsg = 'Calculated estimate: ' + state.serviceName + ' for ' + state.size + '.\n' +
          (state.addonsList.length ? ('Selected Add-ons: ' + state.addonsList.join(', ') + '.\n') : '') +
          'Preferred frequency/date: ';

        openQuoteModal(state.serviceName, estStr, detailsMsg);
      });
    }

    updateCalc();
  }

  // Sticky header shadow
  var nav = document.querySelector('.nav');
  if (nav) {
    window.addEventListener('scroll', function () {
      nav.classList.toggle('scrolled', window.scrollY > 10);
    }, { passive: true });
  }

  // Scroll reveal observer
  var reveals = document.querySelectorAll('.reveal');
  if (!('IntersectionObserver' in window)) {
    reveals.forEach(function (el) { el.classList.add('in'); });
  } else {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1 });

    reveals.forEach(function (el, idx) {
      el.style.transitionDelay = (idx % 3) * 80 + 'ms';
      observer.observe(el);
    });
  }
})();