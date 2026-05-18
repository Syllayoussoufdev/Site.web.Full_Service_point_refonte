/* =============================================
   main.js — Full Service Point SARL
============================================= */

// ─── NAVBAR scroll ───────────────────────────
const navbar = document.getElementById('navbar');
window.addEventListener('scroll', () => {
  navbar.classList.toggle('scrolled', window.scrollY > 60);
}, { passive: true });

// ─── HAMBURGER / MOBILE MENU ─────────────────
const hamburger  = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobile-menu');
const closeMob   = document.getElementById('close-mob');

function openMenu()  { mobileMenu.classList.add('open');    hamburger.classList.add('open');    document.body.style.overflow = 'hidden'; }
function closeMenu() { mobileMenu.classList.remove('open'); hamburger.classList.remove('open'); document.body.style.overflow = ''; }

hamburger.addEventListener('click', () => mobileMenu.classList.contains('open') ? closeMenu() : openMenu());
closeMob.addEventListener('click', closeMenu);
mobileMenu.querySelectorAll('a').forEach(a => a.addEventListener('click', closeMenu));

// ─── REVEAL ON SCROLL ────────────────────────
const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); revealObserver.unobserve(e.target); } });
}, { threshold: 0.12 });

document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

// ─── CONTACT FORM (simulation) ───────────────
const submitBtn    = document.getElementById('submit-btn');
const formSuccess  = document.getElementById('form-success');

if (submitBtn) {
  submitBtn.addEventListener('click', () => {
    submitBtn.textContent = 'Envoi en cours...';
    submitBtn.disabled = true;
    setTimeout(() => {
      submitBtn.textContent = '✓ Envoyé !';
      formSuccess.classList.remove('hidden');
    }, 1200);
  });
}

// ─── SMOOTH ACTIVE NAV LINK ──────────────────
const sections  = document.querySelectorAll('section[id]');
const navLinks  = document.querySelectorAll('.nav-link');

const sectionObserver = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      navLinks.forEach(a => a.style.color = '');
      const active = document.querySelector(`.nav-link[href="#${e.target.id}"]`);
      if (active) active.style.color = '#C4A35A';
    }
  });
}, { threshold: 0.4 });

sections.forEach(s => sectionObserver.observe(s));
