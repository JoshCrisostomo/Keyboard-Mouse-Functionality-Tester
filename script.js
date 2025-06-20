'use strict';
// --------------------- THEME MANIPULATION ---------------------

const colorPicker = document.getElementById('color-picker');

// Listen for color change events
colorPicker.addEventListener('input', (event) => {
  // Update the CSS variable for keyboard border color
  document.documentElement.style.setProperty('--color-keycaps-shadow', event.target.value);
  document.documentElement.style.setProperty('--color-keycaps-shadow-accent', event.target.value);
  document.documentElement.style.setProperty('--color-keycaps-shadow-pressed', event.target.value);
});

// Mouse Glow Color Selector
document.addEventListener("DOMContentLoaded", function () {
    // Get the mouse color picker input
    const mouseColorPicker = document.getElementById('mouseGlowColor');

    // Get the mouse elements
    const mouseLayout = document.querySelector('.mouse-layout');
    const scroll_Wheel = document.querySelector('.scroll-wheel');
    const logo = document.querySelector('.mouse-logo');

    if (mouseColorPicker && mouseLayout && scroll_Wheel && logo) {
      // Listen for color changes
      mouseColorPicker.addEventListener('input', (e) => {
        const color = e.target.value;

        // Update the CSS variable used in animations
        document.documentElement.style.setProperty('--glow-color', color);

        // Update static styles that don't use the variable
        mouseLayout.style.border = `3px solid ${color}`;
        logo.style.color = color;
        logo.style.textShadow = `
          0 0 10px ${color},
          0 0 20px ${color},
          0 0 30px ${color}
        `;
      });
    }
  });

// ------------------- HANDLING KEY PRESS -------------------

function handleKeyPress(e) {
  e.preventDefault();

  const isAltGr = e.key === 'AltGraph';

  if (isAltGr) {
    document.querySelector('.controlleft').classList.remove('key-pressing-simulation');
    document.querySelector('.controlleft').classList.remove('key--pressed');
  }

  const keyElement = document.querySelector('.' + e.code.toLowerCase());
  if (!keyElement) return;

  if (e.type === 'keydown') {
    keyElement.classList.add('key-pressing-simulation');
  } else if (e.type === 'keyup') {
    keyElement.classList.remove('key-pressing-simulation');
  }

  if (!keyElement.classList.contains('key--pressed')) {
    keyElement.classList.add('key--pressed');
  }

  if (e.key === 'Meta' || e.key === 'OS') {
    keyElement.classList.remove('key-pressing-simulation');
  }

  // --- LOG ALL KEYS ---
  if (e.type === 'keydown') {
    const logTextbox = document.getElementById('logTextbox');
    if (!logTextbox) return;

    // Escape angle brackets to avoid HTML weirdness if pasted
    let keyLabel = e.key;

    // Special display for certain keys
    if (keyLabel === ' ') keyLabel = 'Space';
    else if (keyLabel === 'Enter') keyLabel = 'Enter';
    else if (keyLabel === 'Tab') keyLabel = 'Tab';
    else if (keyLabel === 'Backspace') keyLabel = 'Backspace';

    logTextbox.value += `<${keyLabel}>`;
  }
}

function enableKeyboard() {
  document.addEventListener('keydown', handleKeyPress);
  document.addEventListener('keyup', handleKeyPress);
}

function disableKeyboard() {
  document.removeEventListener('keydown', handleKeyPress);
  document.removeEventListener('keyup', handleKeyPress);
}

// Enable logging
enableKeyboard();

  document.getElementById('resetButton').addEventListener('click', function () {
  document.getElementById('logTextbox').value = '';

  const keys = document.querySelectorAll('.key');
  keys.forEach(key => {
    key.classList.remove('key--pressed');
    key.style.backgroundColor = '';
    key.style.color = '';
    key.style.boxShadow = '';
  });
});



// --------------------- CHANGING LAYOUT ---------------------

const slider = document.getElementById('layoutSlider');
const output = document.querySelector('.slider-value');

const fullSizeLayout = document.querySelector('.full-size-layout');
const TKLLayout = document.querySelector('.tkl-layout');

const themeAndLayout = document.querySelector('.theme-and-layout');
const keyboard = document.querySelector('.keyboard');
// related to tkl
const numpad = document.querySelector('.numpad');
// related to 75% layout configuration
const regions = document.querySelectorAll('.region');
const functionRegion = document.querySelector('.function');
const controlRegion = document.querySelector('.system-control');
const navigationRegion = document.querySelector('.navigation');
const fourthRow = document.querySelector('.fourth-row');
const fifthRow = document.querySelector('.fifth-row');

// deleted keys in 75%
const btnScrollLock = document.querySelector('.scrolllock');
const btnInsert = document.querySelector('.insert');
const btnContextMenu = document.querySelector('.contextmenu');

// remapped keys in 75%
const btnDelete = document.querySelector('.delete');
const btnHome = document.querySelector('.home');
const btnEnd = document.querySelector('.end');
const btnPgUp = document.querySelector('.pageup');
const btnPgDn = document.querySelector('.pagedown');

// Function to update the layout based on slider value
function updateLayout() {
  const sliderValue = parseInt(slider.value);

  // Update output text based on slider position
  switch (sliderValue) {
    case 1:
      output.textContent = 'Full';
      document.querySelector('.gif-selector').style.display='block'
      document.querySelector('.mini-screen').style.display='block'
      changeToFullSize();
      break;
    case 2:
      output.textContent = 'TKL';
      document.querySelector('.gif-selector').style.display='none'
      document.querySelector('.mini-screen').style.display='none'
      changeToTKL();
      break;
    case 3:
      output.textContent = '75%';
      document.querySelector('.gif-selector').style.display='none'
      document.querySelector('.mini-screen').style.display='none'
      changeTo75();
      break;
    default:
      break;
  }
}

const changeToFullSize = function () {
  undo75();
  undoTKL();
  themeAndLayout.style.maxWidth = '120rem';
  keyboard.classList.add('full-size');
};

const undoTKL = function () {
  keyboard.classList.remove('tkl');
  numpad.classList.remove('hidden--step1');
  numpad.classList.remove('hidden--step2');
};

const changeToTKL = function () {
  return new Promise((resolve) => {
    undo75();

    numpad.classList.add('hidden--step1');
    themeAndLayout.style.maxWidth = '98rem';
    // timeout added for smooth transition between applying --step1 & --step2
    setTimeout(function () {
      keyboard.classList.remove('full-size');

      keyboard.classList.add('tkl');
      numpad.classList.add('hidden--step2');
      resolve(); // Resolving the promise when transition is complete
    }, 150);
  });
};

const updateStylesFor75 = (is75Percent) => {
  const paddingValue = is75Percent ? '0.15rem' : '0.5rem';
  const displayValue = is75Percent ? 'none' : 'flex';
  const transformValue = is75Percent ? '-66.7%' : '0%';

  keyboard.classList.toggle('seventy-five-percent', is75Percent);
  regions.forEach((region) => (region.style.padding = paddingValue));

  functionRegion.style.gridTemplateColumns = is75Percent
    ? '2fr 0 repeat(4, 2fr) 0 repeat(4, 2fr) 0 repeat(4,2fr)'
    : '2fr 2fr repeat(4, 2fr) 1fr repeat(4, 2fr) 1fr repeat(4,2fr)';
  functionRegion.style.width = is75Percent ? '86.7%' : '100%';

  controlRegion.style.width = is75Percent ? '95%' : '100%';
  controlRegion.style.transform = `translateX(${transformValue})`;
  btnScrollLock.style.display = displayValue;
  btnInsert.style.display = displayValue;
  btnContextMenu.style.display = displayValue;

  const btnDeleteTransform = is75Percent ? 'translateY(-106%)' : 'translateY(0%)';
  btnDelete.style.gridColumn = is75Percent ? 3 : 1;
  btnDelete.style.gridRow = is75Percent ? 1 : 2;
  btnDelete.style.transform = btnDeleteTransform;

  btnHome.style.gridColumn = is75Percent ? 3 : 2;
  btnHome.style.gridRow = is75Percent ? 1 : 1;

  btnEnd.style.gridColumn = is75Percent ? 3 : 2;
  btnEnd.style.gridRow = is75Percent ? 2 : 2;

  btnPgUp.style.gridColumn = is75Percent ? 3 : 3;
  btnPgUp.style.gridRow = is75Percent ? 1 : 1;

  btnPgDn.style.gridColumn = is75Percent ? 3 : 3;
  btnPgDn.style.gridRow = is75Percent ? 2 : 2;

  navigationRegion.style.transform = `translateX(${transformValue})`;

  fourthRow.style.gridTemplateColumns = is75Percent
    ? '2.29fr repeat(10, 1fr) 1.75fr 1.04fr'
    : '2.29fr repeat(10, 1fr) 2.79fr';

  const fifthRowColumns = is75Percent
    ? 'repeat(3, 1.29fr) 6.36fr repeat(3, 1fr) 2.15fr'
    : 'repeat(3, 1.29fr) 6.36fr repeat(4, 1.29fr)';
  fifthRow.style.gridTemplateColumns = fifthRowColumns;
};

const undo75 = () => {
  updateStylesFor75(false);
};

const changeTo75 = async () => {
  await changeToTKL(); // Wait for the transition in changeToTKL() to complete
  themeAndLayout.style.maxWidth = '85rem';
  updateStylesFor75(true);
};

// Event listener for slider change
slider.addEventListener('input', updateLayout);

// Initial layout update based on default slider value
updateLayout();

const gifSelect = document.getElementById("gifSelect");
const miniScreenImg = document.getElementById("miniScreenImg");

gifSelect.addEventListener("change", () => {
  const selectedGif = gifSelect.value;

  if (selectedGif === "off") {
    miniScreenImg.style.display = "none"; // hide the image
  } else {
    miniScreenImg.src = `assets/${selectedGif}`;
    miniScreenImg.style.display = "block"; // show it back if hidden
  }
});

// --------------------- MOUSE TESTER ---------------------

const click = document.getElementById('click');
const textarea = document.getElementById('textarea');
const clicks = document.getElementById('count');
const dcCount = document.getElementById('dcCount');
const reset = document.getElementById('reset');

// Reset button logic
reset.addEventListener('click', () => {
  clicks.value = 0;
  dcCount.value = 0;
  textarea.value = '';
  click.style.background = 'rgb(19, 19, 19)';
});

// Microtime helper
function microtime(getAsFloat) {
  const now = Date.now() / 1000;
  const s = parseInt(now, 10);
  return getAsFloat ? now : `${Math.round((now - s) * 1000) / 1000} ${s}`;
}

let prevClickMicrotime = microtime(true);

// Main click event logic
function clickEvent(buttonLabel, diff) {
  if (diff <= 0.08) {
    click.style.background = 'red';
    dcCount.value = parseInt(dcCount.value || 0) + 1;
  }

  const logEntry = `[${buttonLabel}] ${diff.toFixed(5)}s`;
  textarea.value = `${logEntry}\n${textarea.value}`;
  clicks.value = parseInt(clicks.value || 0) + 1;
}

// Map mouse button codes to labels
function getMouseButtonLabel(buttonCode) {
  switch (buttonCode) {
    case 0:
      return 'Left';
    case 1:
      return 'Middle';
    case 2:
      return 'Right';
    default:
      return `Button${buttonCode}`;
  }
}

function handleMouseDown(e) {
  e.preventDefault(); // Prevent right-click menu
  const currentTime = microtime(true);
  const diff = currentTime - prevClickMicrotime;
  const buttonLabel = getMouseButtonLabel(e.button);

  clickEvent(buttonLabel, diff);
  prevClickMicrotime = currentTime;

  const btn = buttonMap[e.button];
  if (btn) {
    btn.classList.add('active');
  }
}

function handleMouseUp(e) {
  const btn = buttonMap[e.button];
  if (btn) {
    btn.classList.remove('active');
  }
}

function handleWheel(e) {
  // Normalize scroll direction
  const direction = e.deltaY < 0 ? 'up' : 'down';

  if (direction === 'up') {
    scrollWheel.classList.add('scroll-up');
  } else {
    scrollWheel.classList.add('scroll-down');
  }

  // Remove after short delay
  setTimeout(() => {
    scrollWheel.classList.remove('scroll-up', 'scroll-down');
  }, 200);
}

// Map mouse buttons to UI
const buttonMap = {
  0: document.querySelector('.left-button'), // Left click
  1: document.querySelector('.scroll-wheel'), // Middle click
  2: document.querySelector('.right-button'), // Right click
};

const scrollWheel = document.querySelector('.scroll-wheel');

function enableMouse() {
  document.addEventListener('mousedown', handleMouseDown);
  document.addEventListener('mouseup', handleMouseUp);
  document.addEventListener('wheel', handleWheel);
}

function disableMouse() {
  document.removeEventListener('mousedown', handleMouseDown);
  document.removeEventListener('mouseup', handleMouseUp);
  document.removeEventListener('wheel', handleWheel);
}

// -------------- INITIAL STATE ----------------

// Hide keyboard and mouse testers initially
document.getElementById('keyboardTester').style.display = 'none';
document.getElementById('mouseTester').style.display = 'none';

// No listeners active initially
disableKeyboard();
disableMouse();
