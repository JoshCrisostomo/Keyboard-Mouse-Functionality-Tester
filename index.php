<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Mouse & Keyboard Tester</title>
    <link rel="icon" href="img/favicon.png" />
    <link rel="manifest" href="manifest.webmanifest" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script defer src="script.js"></script>
  </head>
  
  <body>
    <div class="title">
      <h1>Keyboard <span class="ampersand">&</span> Mouse Functionality Tester</h1>
    </div>
    

     <div class="container1">
        <div class="panel keybs" onclick="showKeyboardTester()">
            <img src="assets/k.png" alt="Keyboard Image" class="panel-image">
            <p class="panel-label">Keyboard </p>
            <p class="panel-label"> Tester</p>
        </div>
        <div class="panel mouse" onclick="showMouseTester()">
            <img src="assets/m.png" alt="Mouse Image" class="panel-image">
            <p class="panel-label">Mouse </p>
            <p class="panel-label">Tester</p>
        </div>
    </div>

    
    <div class="button-container">
      <button class="back" onclick="goBackToPanels()">
        <i class="fa-solid fa-arrow-right-to-bracket"></i> Back
      </button>
    </div>

    <div class="container keyboard-tester" id="keyboardTester" style="display:none;">
    <header>
      <section class="intro">
        <h1 class="heading-keyboard">
          <span>Test Your Keyboard</span>
        </h1>
        <p class="paragraph ">
          This tool allows users to test their keyboard, detect any issues, and ensure each key is functioning properly.
        </p>
      </section>
    </header>

    <main>
      <div class="theme-and-layout">
        <div></div>
        <div class="slider-container">
          <output class="slider-value">Full</output>
          <input
            type="range"
            min="1"
            max="3"
            value="1"
            class="slider"
            id="layoutSlider"
          />
        </div>
        

        <section class="theme-section">
          <div class="retro" aria-label="retro theme option">
            <div class="theme-color"></div>
            <div class="theme-color"></div>
            <div class="theme-color"></div>
            <div class="theme-color"></div>
          </div>
          <div class="navy-blue" aria-label="navy-blue theme option">
            <div class="theme-color"></div>
            <div class="theme-color"></div>
            <div class="theme-color"></div>
            <div class="theme-color"></div>
          </div>
        </section>
      </div>

      <div class="textbox">
        <textarea id="logTextbox" rows="10" cols="50" readonly placeholder="Click any key..."></textarea>
        <button id="resetButton">Reset</button>
      </div>


<div class="top-controls">
  <p class="color-selector">
    Select Color: <input type="color" id="color-picker" value="#0b0b0b">
  </p>
  <div class="gif-selector">
    <label for="gifSelect">Select Display:</label>
    <select id="gifSelect">
      <option value="red-black.gif">Red & Black</option>
      <option value="orange-fire.gif">Orange Fire</option>
      <option value="yellow-Saiyan.gif">Yellow Saiyan</option>
      <option value="green-zoro.gif">Green Zoro</option>
      <option value="cyan-sasuke.gif">Cyan Sasuke</option>
      <option value="blue-gojo.gif">Blue Gojo</option>
      <option value="purple-gengar.gif">Purple Gengar</option>
      <option value="pink-anime.gif">Pink Anime</option>
      <option value="black-brs.gif">Black BRS</option>
      <option value="white-anime.gif">White Anime</option>
      <option value="gray-tom.gif">Gray Tom</option>
      <option value="off">- OFF -</option>
    </select>
  </div>
</div>

      <div class="keyboard full-size">
        <section class="function region">
          <div class="key escape">ESC</div>
          <div class="empty-space-between-keys" aria-hidden="true"></div>
          <div class="key f1">F1</div>
          <div class="key f2">F2</div>
          <div class="key f3">F3</div>
          <div class="key f4">F4</div>
          <div class="empty-space-between-keys" aria-hidden="true"></div>
          <div class="key f5">F5</div>
          <div class="key f6">F6</div>
          <div class="key f7">F7</div>
          <div class="key f8">F8</div>
          <div class="empty-space-between-keys" aria-hidden="true"></div>
          <div class="key f9">F9</div>
          <div class="key f10">F10</div>
          <div class="key f11">F11</div>
          <div class="key f12">F12</div>
        </section>

        <section class="system-control region">
          <div class="key printscreen key--accent-color">Prt Sc</div>
          <div class="key scrolllock key--accent-color">Scr Lk</div>
          <div class="key pause key--accent-color">Pause</div>
        </section>

        
        <div class="mini-screen">
          <img id="miniScreenImg" src="assets/red-black.gif" alt="Mini screen display" />
        </div>


        <section class="typewriter region">
          <div class="first-row">
            <div class="key backquote key--sublegend key--accent-color">
              <span>~</span> <span>`</span>
            </div>
            <div class="key digit1">1</div>
            <div class="key digit2">2</div>
            <div class="key digit3">3</div>
            <div class="key digit4">4</div>
            <div class="key digit5">5</div>
            <div class="key digit6">6</div>
            <div class="key digit7">7</div>
            <div class="key digit8">8</div>
            <div class="key digit9">9</div>
            <div class="key digit0">0</div>
            <div class="key minus key--sublegend">
              <span>&minus;</span> <span>&dash;</span>
            </div>
            <div class="key equal key--sublegend">
              <span>&plus;</span><span>&equals;</span>
            </div>
            <div class="key backspace key--accent-color">Backspace</div>
          </div>

          <div class="second-row">
            <div class="key tab key--accent-color">Tab</div>
            <div class="key keyq">Q</div>
            <div class="key keyw">W</div>
            <div class="key keye">E</div>
            <div class="key keyr">R</div>
            <div class="key keyt">T</div>
            <div class="key keyy">Y</div>
            <div class="key keyu">U</div>
            <div class="key keyi">I</div>
            <div class="key keyo">O</div>
            <div class="key keyp">P</div>
            <div class="key bracketleft key--sublegend">
              <span>&lbrace;</span> <span>&lbrack;</span>
            </div>
            <div class="key bracketright key--sublegend">
              <span>&rbrace;</span> <span>&rbrack;</span>
            </div>
            <div class="key backslash key--sublegend key--accent-color">
              <span>&vert;</span><span>&Backslash;</span>
            </div>
          </div>

          <div class="third-row">
            <div class="key capslock key--accent-color">Caps</div>
            <div class="key keya">A</div>
            <div class="key keys">S</div>
            <div class="key keyd">D</div>
            <div class="key keyf">F</div>
            <div class="key keyg">G</div>
            <div class="key keyh">H</div>
            <div class="key keyj">J</div>
            <div class="key keyk">K</div>
            <div class="key keyl">L</div>
            <div class="key semicolon key--sublegend">
              <span>&colon;</span> <span>&semi;</span>
            </div>
            <div class="key quote key--sublegend">
              <span>&quot;</span> <span>&apos;</span>
            </div>
            <div class="key enter key--accent-color">
              <span>&LongLeftArrow;</span>
            </div>
          </div>

          <div class="fourth-row">
            <div class="key shiftleft key--accent-color">Shift</div>
            <div class="key keyz">Z</div>
            <div class="key keyx">X</div>
            <div class="key keyc">C</div>
            <div class="key keyv">V</div>
            <div class="key keyb">B</div>
            <div class="key keyn">N</div>
            <div class="key keym">M</div>
            <div class="key comma key--sublegend">
              <span>&lt;</span> <span>&comma;</span>
            </div>
            <div class="key period key--sublegend">
              <span>&gt;</span> <span>&period;</span>
            </div>
            <div class="key slash key--sublegend">
              <span>&quest;</span> <span>&sol;</span>
            </div>
            <div class="key shiftright key--accent-color">Shift</div>
          </div>

          <div class="fifth-row">
            <div class="key controlleft key--accent-color">Ctrl</div>
            <div
              class="key metaleft osleft key--accent-color"
              aria-label="Left Windows key"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 4875 4875"
                aria-label="Left Windows key icon"
              >
                <path
                  d="M0 0h2311v2310H0zm2564 0h2311v2310H2564zM0 2564h2311v2311H0zm2564 0h2311v2311H2564"
                />
              </svg>
            </div>
            <div class="key altleft key--accent-color">Alt</div>
            <div class="key space key--accent-color" aria-label="Space">
              <span>&UnderBar;&UnderBar;&UnderBar;&UnderBar;</span>
            </div>
            <div class="key altright key--accent-color">Alt</div>
            <div
              class="key metaright osright key--accent-color"
              aria-label="Right Windows key"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 4875 4875"
                aria-label="Right Windows key icon"
              >
                <path
                  d="M0 0h2311v2310H0zm2564 0h2311v2310H2564zM0 2564h2311v2311H0zm2564 0h2311v2311H2564"
                />
              </svg>
            </div>
            <div
              class="key contextmenu key--accent-color"
              aria-label="Context Menu key"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 100 100"
                aria-label="Context Menu key icon"
              >
                <rect
                  x="10"
                  y="10"
                  width="80"
                  height="80"
                  rx="2"
                  ry="2"
                  stroke-width="7"
                />
                <rect
                  x="25"
                  y="30"
                  width="50"
                  height="4.5"
                  rx="2"
                  ry="2"
                  stroke-width="4.5"
                />
                <rect
                  x="25"
                  y="47.5"
                  width="50"
                  height="4.5"
                  rx="2"
                  ry="2"
                  stroke-width="4.5"
                />
                <rect
                  x="25"
                  y="65"
                  width="50"
                  height="4.5"
                  rx="2"
                  ry="2"
                  stroke-width="4.5"
                />
              </svg>
            </div>
            <div class="key controlright key--accent-color">Ctrl</div>
          </div>
        </section>

        <section class="navigation region">
          <div class="key insert key--accent-color">Insert</div>
          <div class="key home key--accent-color">Home</div>
          <div class="key pageup key--accent-color">Pg Up</div>
          <div class="key delete key--accent-color">Delete</div>
          <div class="key end key--accent-color">End</div>
          <div class="key pagedown key--accent-color">Pg Dn</div>
          <div class="key arrowup" aria-label="Up Arrow key">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              enable-background="new 0 0 32 32"
              viewBox="0 0 32 32"
              aria-label="Up Arrow"
            >
              <path
                d="M18.221,7.206l9.585,9.585c0.879,0.879,0.879,2.317,0,3.195l-0.8,0.801c-0.877,0.878-2.316,0.878-3.194,0  l-7.315-7.315l-7.315,7.315c-0.878,0.878-2.317,0.878-3.194,0l-0.8-0.801c-0.879-0.878-0.879-2.316,0-3.195l9.587-9.585  c0.471-0.472,1.103-0.682,1.723-0.647C17.115,6.524,17.748,6.734,18.221,7.206z"
              />
            </svg>
          </div>
          <div class="key arrowleft" aria-label="Left Arrow key">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              enable-background="new 0 0 32 32"
              viewBox="0 0 32 32"
              aria-label="Left Arrow"
            >
              <path
                d="M7.701,14.276l9.586-9.585c0.879-0.878,2.317-0.878,3.195,0l0.801,0.8c0.878,0.877,0.878,2.316,0,3.194  L13.968,16l7.315,7.315c0.878,0.878,0.878,2.317,0,3.194l-0.801,0.8c-0.878,0.879-2.316,0.879-3.195,0l-9.586-9.587  C7.229,17.252,7.02,16.62,7.054,16C7.02,15.38,7.229,14.748,7.701,14.276z"
              />
            </svg>
          </div>
          <div class="key arrowdown" aria-label="Down Arrow key">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              enable-background="new 0 0 32 32"
              viewBox="0 0 32 32"
              aria-label="Down Arrow"
            >
              <path
                d="M14.77,23.795L5.185,14.21c-0.879-0.879-0.879-2.317,0-3.195l0.8-0.801c0.877-0.878,2.316-0.878,3.194,0  l7.315,7.315l7.316-7.315c0.878-0.878,2.317-0.878,3.194,0l0.8,0.801c0.879,0.878,0.879,2.316,0,3.195l-9.587,9.585  c-0.471,0.472-1.104,0.682-1.723,0.647C15.875,24.477,15.243,24.267,14.77,23.795z"
              />
            </svg>
          </div>
          <div class="key arrowright" aria-label="Right Arrow key">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              enable-background="new 0 0 32 32"
              viewBox="0 0 32 32"
              aria-label="Right Arrow"
            >
              <path
                d="M24.291,14.276L14.705,4.69c-0.878-0.878-2.317-0.878-3.195,0l-0.8,0.8c-0.878,0.877-0.878,2.316,0,3.194  L18.024,16l-7.315,7.315c-0.878,0.878-0.878,2.317,0,3.194l0.8,0.8c0.878,0.879,2.317,0.879,3.195,0l9.586-9.587  c0.472-0.471,0.682-1.103,0.647-1.723C24.973,15.38,24.763,14.748,24.291,14.276z"
              />
            </svg>
          </div>
        </section>

        <section class="numpad region">
          <div class="key numlock">NumLk</div>
          <div class="key numpaddivide">/</div>
          <div class="key numpadmultiply">&times;</div>
          <div class="key numpadsubtract">&minus;</div>
          <div class="key numpad7">7</div>
          <div class="key numpad8">8</div>
          <div class="key numpad9">9</div>
          <div class="key numpadadd">&plus;</div>
          <div class="key numpad4">4</div>
          <div class="key numpad5">5</div>
          <div class="key numpad6">6</div>
          <div class="key numpad1">1</div>
          <div class="key numpad2">2</div>
          <div class="key numpad3">3</div>
          <div class="key numpadenter">Enter</div>
          <div class="key numpad0">0</div>
          <div class="key numpaddecimal">&middot;</div>
        </section>
      </div>
    </main>
</div>

    <div class="container2 mouse-tester" id="mouseTester" style="display:none;">
        <header>
            <section class="intro1">
                <h1 class="heading-mouse">
                    <span>Test Your Mouse</span>
                </h1>
                <p class="paragraph">
                    This tool lets users test their mouse buttons, check response times, and verify if each button is working correctly, including a double-click test.
                </p>
            </section>
        </header>

        <main>
            <body onmousedown="mouseClick();" oncontextmenu="return false;">

                <p class="move1">
                  Clicks:
                  <input id="count" type="text" value="0" size="4">
                  <button id="reset">reset</button>
                </p>

                <p class="move2">
                  Fast double click count:
                  <input id="dcCount" type="text" value="0" size="4">
                </p>

                <textarea id="textarea"></textarea>
                
              <div id="click" class="click">Click here to test.</div>

          </body>
        </main>
        <div class="mouse-layout">
          <div class="left-button"></div>
          <div class="right-button"></div>
          <div class="scroll-wheel"></div>
          <div class="mouse-logo">G3</div>
        </div>
    </div>

    <script>
          function showKeyboardTester() {
          document.querySelector('.container1').style.display = 'none';
          document.getElementById('keyboardTester').style.display = 'block';
          document.getElementById('mouseTester').style.display = 'none';
          document.querySelector('.title').style.display='none'
          document.querySelector('.back').style.display='block'

          enableKeyboard();
          disableMouse();
        }

        function showMouseTester() {
          document.querySelector('.container1').style.display = 'none';
          document.getElementById('mouseTester').style.display = 'block';
          document.getElementById('keyboardTester').style.display = 'none';
          document.querySelector('.title').style.display='none'
          document.querySelector('.back').style.display='block'

          enableMouse();
          disableKeyboard();
        }

        function goBackToPanels() {
          document.querySelector('.container1').style.display = 'flex';
          document.getElementById('keyboardTester').style.display = 'none';
          document.getElementById('mouseTester').style.display = 'none';
          document.querySelector('.title').style.display='block'
          document.querySelector('.back').style.display='none'

          disableKeyboard();
          disableMouse();
        }
    </script>
  </body>
</html>