/* 법률사무소 묘안 — 화면 동작 */
(function () {
  'use strict';

  var $ = function (sel, root) { return (root || document).querySelector(sel); };
  var $$ = function (sel, root) { return Array.prototype.slice.call((root || document).querySelectorAll(sel)); };

  /* 머리글: 스크롤하면 아래 구분선 표시 ------------------------------------ */
  var header = $('.site-header');
  var onScroll = function () {
    if (header) header.classList.toggle('is-scrolled', window.scrollY > 4);
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* 모바일 메뉴 ------------------------------------------------------------ */
  var toggle = $('.menu-toggle');
  var nav = $('#site-nav');
  var setMenu = function (open) {
    if (!toggle || !nav) return;
    toggle.setAttribute('aria-expanded', String(open));
    nav.classList.toggle('is-open', open);
    document.body.classList.toggle('menu-open', open);
  };
  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      setMenu(toggle.getAttribute('aria-expanded') !== 'true');
    });
    $$('a', nav).forEach(function (a) {
      a.addEventListener('click', function () { setMenu(false); });
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
        setMenu(false);
        toggle.focus();
      }
    });
    window.matchMedia('(min-width: 1081px)').addEventListener('change', function (e) {
      if (e.matches) setMenu(false);
    });
  }

  /* 지금 보고 있는 구역을 메뉴에 표시 -------------------------------------- */
  var navLinks = $$('.nav ul a[href^="#"]');
  if ('IntersectionObserver' in window && navLinks.length) {
    var byId = {};
    navLinks.forEach(function (a) { byId[a.getAttribute('href').slice(1)] = a; });
    var spy = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        navLinks.forEach(function (a) { a.removeAttribute('aria-current'); });
        var link = byId[entry.target.id];
        if (link) link.setAttribute('aria-current', 'true');
      });
    }, { rootMargin: '-45% 0px -50% 0px' });
    $$('main section[id]').forEach(function (s) { spy.observe(s); });
  }

  /* 첫 화면 그림: 선이 화면 오른쪽 끝(인장 앞)에서 정확히 끝나도록 맞춤 ------- */
  var thread = $('.thread svg');
  if (thread) {
    var path = $('path', thread);
    var base = path.getAttribute('d').replace(/L[\d.]+ 60$/, '');
    var fitThread = function () {
      var w = thread.clientWidth, h = thread.clientHeight;
      if (!w || !h) return;
      var scale = Math.max(w / 1400, h / 120);
      var end = Math.max(390, w / scale - 1);
      path.setAttribute('d', base + 'L' + end.toFixed(1) + ' 60');
    };
    fitThread();
    window.addEventListener('resize', fitThread, { passive: true });
  }

  /* 모바일 하단 상담 버튼: 첫 화면을 지나면 표시, 상담 안내 구역에서는 숨김 ---- */
  var cta = $('[data-mobile-cta]');
  var hero = $('.hero');
  var contact = $('#contact');
  if (cta && hero && contact && 'IntersectionObserver' in window) {
    var seen = { hero: true, contact: false };
    var ctaObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        seen[entry.target === hero ? 'hero' : 'contact'] = entry.isIntersecting;
      });
      cta.classList.toggle('is-visible', !seen.hero && !seen.contact);
    });
    ctaObserver.observe(hero);
    ctaObserver.observe(contact);
  }

  /* 오시는 길: 주소로 지도 링크 만들기 ------------------------------------- */
  var addressEl = $('[data-address]');
  if (addressEl) {
    var address = addressEl.textContent.trim();
    if (address.indexOf('○') === -1) {
      var q = encodeURIComponent(address);
      $$('[data-map]').forEach(function (a) {
        a.href = a.getAttribute('data-map') === 'naver'
          ? 'https://map.naver.com/p/search/' + q
          : 'https://map.kakao.com/?q=' + q;
      });
    }
  }

  /* 연도 ------------------------------------------------------------------ */
  $$('[data-year]').forEach(function (el) { el.textContent = new Date().getFullYear(); });

  /* 상담 신청 양식 --------------------------------------------------------- */
  var form = $('#consult-form');
  if (!form) return;

  form.noValidate = true;
  var to = form.getAttribute('data-mailto');
  var statusBox = $('.form-status', form);
  var copyBtn = $('[data-copy]', form);
  var message = $('#f-msg', form);
  var counter = $('[data-count]', form);
  var lastText = '';

  var updateCount = function () {
    counter.textContent = message.value.length + ' / ' + message.maxLength;
  };
  message.addEventListener('input', updateCount);
  updateCount();

  var MESSAGES = {
    'f-name': { valueMissing: '성함을 입력해 주세요.' },
    'f-phone': {
      valueMissing: '연락받으실 전화번호를 입력해 주세요.',
      patternMismatch: '전화번호를 확인해 주세요. 예) 010-1234-5678'
    },
    'f-email': { typeMismatch: '이메일 주소를 확인해 주세요. 예) name@example.com' },
    'f-msg': { valueMissing: '상담받고 싶은 내용을 적어 주세요.' },
    'f-agree': { valueMissing: '온라인으로 신청하려면 개인정보 수집·이용에 동의해 주세요.' }
  };

  var errorFor = function (field) {
    var id = field.id + '-err';
    var el = document.getElementById(id);
    if (!el) {
      el = document.createElement('p');
      el.className = 'field-error';
      el.id = id;
      el.hidden = true;
      field.closest('.field, .consent').appendChild(el);
    }
    return el;
  };

  var describedBy = function (field, id, on) {
    var ids = (field.getAttribute('aria-describedby') || '').split(/\s+/).filter(Boolean);
    ids = ids.filter(function (x) { return x !== id; });
    if (on) ids.push(id);
    if (ids.length) field.setAttribute('aria-describedby', ids.join(' '));
    else field.removeAttribute('aria-describedby');
  };

  var check = function (field) {
    if (!field.willValidate) return true;
    var v = field.validity;
    var text = '';
    if (!v.valid) {
      var custom = MESSAGES[field.id] || {};
      ['valueMissing', 'patternMismatch', 'typeMismatch', 'tooLong'].some(function (k) {
        if (v[k]) { text = custom[k] || field.validationMessage; return true; }
        return false;
      });
      if (!text) text = field.validationMessage;
    }
    var el = errorFor(field);
    el.textContent = text;
    el.hidden = !text;
    if (text) field.setAttribute('aria-invalid', 'true');
    else field.removeAttribute('aria-invalid');
    describedBy(field, el.id, !!text);
    return !text;
  };

  var fields = $$('input, select, textarea', form);
  fields.forEach(function (f) {
    var recheck = function () { if (f.getAttribute('aria-invalid') === 'true') check(f); };
    f.addEventListener('input', recheck);
    f.addEventListener('change', recheck);
  });

  var value = function (sel) { return ($(sel, form).value || '').trim(); };

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    var invalid = fields.filter(function (f) { return !check(f); });
    if (invalid.length) {
      invalid[0].focus();
      return;
    }

    var name = value('#f-name');
    var area = value('#f-area') || '미선택';
    var now = new Date();
    var stamp = now.getFullYear() + '. ' + (now.getMonth() + 1) + '. ' + now.getDate() + '. ' +
      String(now.getHours()).padStart(2, '0') + ':' + String(now.getMinutes()).padStart(2, '0');

    var subject = '[상담 신청] ' + name + ' / ' + area;
    lastText = [
      '법률사무소 묘안 온라인 상담 신청',
      '',
      '성함: ' + name,
      '연락처: ' + value('#f-phone'),
      '이메일: ' + (value('#f-email') || '-'),
      '상담 분야: ' + area,
      '',
      '[상담 내용]',
      value('#f-msg'),
      '',
      '개인정보 수집·이용 동의: 동의함 (' + stamp + ')'
    ].join('\r\n');

    statusBox.hidden = false;
    window.location.href = 'mailto:' + to +
      '?subject=' + encodeURIComponent(subject) +
      '&body=' + encodeURIComponent(lastText);
  });

  if (copyBtn) {
    copyBtn.addEventListener('click', function () {
      var done = function () {
        copyBtn.textContent = '복사했습니다';
        setTimeout(function () { copyBtn.textContent = '신청 내용 복사하기'; }, 2400);
      };
      var fallback = function () {
        var ta = document.createElement('textarea');
        ta.value = lastText;
        ta.setAttribute('readonly', '');
        ta.style.position = 'fixed';
        ta.style.opacity = '0';
        document.body.appendChild(ta);
        ta.select();
        try { document.execCommand('copy'); done(); } catch (err) { /* 복사 불가 환경 */ }
        document.body.removeChild(ta);
      };
      if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(lastText).then(done, fallback);
      } else {
        fallback();
      }
    });
  }
})();
