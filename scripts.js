
(function(){
  'use strict';

  // Helper: add 'active' class to nav links matching current path
  function setActiveNav() {
    try {
      var links = document.querySelectorAll('.navbar-custom a, .nav-link');
      var path = window.location.pathname.split('/').pop();
      if(!path) path = 'home.html';
      links.forEach(function(a){
        var href = a.getAttribute('href');
        if(!href) return;
        var hrefBase = href.split('/').pop();
        if(hrefBase === path) {
          a.classList.add('active');
          var li = a.closest('.nav-item');
          if(li) li.classList.add('active');
        }
      });
    } catch(e) { console.warn('setActiveNav error', e); }
  }

  // Image rollover: optional JS enhancement (adds focus handling)
  function setupRollovers(){
    var rolls = document.querySelectorAll('.rollover');
    rolls.forEach(function(r){
      r.setAttribute('tabindex','0');
      r.addEventListener('focus', function(){ r.classList.add('hover'); });
      r.addEventListener('blur', function(){ r.classList.remove('hover'); });
    });
  }

  // Require at least two checkboxes selected (for EX4 open-source form)
  function requireAtLeastTwoCheckboxes(formSelector, checkboxName){
    var form = document.querySelector(formSelector);
    if(!form) return;
    form.addEventListener('submit', function(e){
      var boxes = form.querySelectorAll('input[type="checkbox"][name="'+checkboxName+'"]');
      if(!boxes || boxes.length===0) return;
      var checked = Array.prototype.slice.call(boxes).filter(function(b){ return b.checked; });
      if(checked.length < 2){
        e.preventDefault();
        alert('Please select at least two options before submitting.');
        boxes[0].focus();
        return false;
      }
    });
  }

  // Radio reveal: show related info when radio selected
  function setupRadioReveal(radioNamePrefix){
    var radios = document.querySelectorAll('input[type="radio"]');
    radios.forEach(function(r){
      r.addEventListener('change', function(){
        var name = r.name;
        // reveal container with id pattern: reveal-{name}-{value}
        var value = r.value;
        var revealId = 'reveal-' + name + '-' + value;
        var reveals = document.querySelectorAll('[id^="reveal-' + name + '-"]');
        reveals.forEach(function(el){ el.style.display = 'none'; });
        var target = document.getElementById(revealId);
        if(target) target.style.display = 'block';
      });
    });
  }

  // Survey validation: ensure each tool has a radio selection in the group
  function validateSurvey(formSelector){
    var form = document.querySelector(formSelector);
    if(!form) return;
    form.addEventListener('submit', function(e){
      var groups = form.querySelectorAll('[data-survey-tool]');
      for(var i=0;i<groups.length;i++){
        var g = groups[i];
        var name = g.getAttribute('data-survey-tool');
        var checked = form.querySelectorAll('input[type="radio"][name="'+name+'"]:checked');
        if(checked.length===0){
          e.preventDefault();
          alert('Please answer the survey question for: ' + name);
          var el = g.querySelector('input[type="radio"]');
          if(el) el.focus();
          return false;
        }
      }
    });
  }

  document.addEventListener('DOMContentLoaded', function(){
    setActiveNav();
    setupRollovers();
    // try to bind common forms if they exist
    requireAtLeastTwoCheckboxes('#open-source-form', 'opensource_options[]');
    setupRadioReveal();
    validateSurvey('#tools-survey-form');
  });

})(); // end IIFE
