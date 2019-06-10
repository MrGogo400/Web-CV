// a key map of allowed keys
var allowedKeys = {
    37: 'left',
    38: 'up',
    39: 'right',
    40: 'down',
    65: 'a',
    66: 'b'
  };
  
  // the 'official' Konami Code sequence
  var konamiCode = ['up', 'up', 'down', 'down', 'left', 'right', 'left', 'right', 'b', 'a'];
  
  // a variable to remember the 'position' the user has reached so far.
  var konamiCodePosition = 0;
  
  // add keydown event listener
  document.addEventListener('keydown', function(e) {
    // get the value of the key code from the key map
    var key = allowedKeys[e.keyCode];
    // get the value of the required key from the konami code
    var requiredKey = konamiCode[konamiCodePosition];
  
    // compare the key with the required key
    if (key == requiredKey) {
  
      // move to the next key in the konami code sequence
      konamiCodePosition++;
  
      // if the last key is reached, activate cheats
      if (konamiCodePosition == konamiCode.length) {
        activateCheats();
        konamiCodePosition = 0;
      }
    } else {
      konamiCodePosition = 0;
    }
  });
  
  function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
      if ((new Date().getTime() - start) > milliseconds){
        break;
      }
    }
  }

  function activateCheats() {

    let achievementSound = new Audio('https://dl.dropboxusercontent.com/s/8qvrpd69ua7wio8/XboxAchievement.mp3')
    let achievementSoundRare = new Audio('https://dl.dropboxusercontent.com/s/po1udpov43am81i/XboxOneRareAchievement.mp3')
    const achievement = () => {
        let title = 'Admin Access'
        let score = '1337'
        let rare = true
        document.querySelector('.achiev_name').innerText = title
        document.querySelector('.acheive_score').innerText = score
        document.getElementById("a_trigger").disabled = true
        document.querySelector('.unlocked').innerText = rare ? 'Rare achievement unlocked' : 'Achievement unlocked'
        if (rare) {
            achievementSoundRare.play()
            document.querySelector('.achievement').classList.add('rare')
        } else {
            achievementSound.play()
        }
        document.querySelector('.circle').classList.add('circle_animate')
        document.querySelector('.banner').classList.add('banner-animate')
        document.querySelector('.achieve_disp').classList.add('achieve_disp_animate')
        setTimeout(() => {
            document.querySelector('.circle').classList.remove('circle_animate')
            document.querySelector('.banner').classList.remove('banner-animate')
            document.querySelector('.achieve_disp').classList.remove('achieve_disp_animate')
        }, 12000)
    }

    achievement();
    
    window.setTimeout(function() {
      location.href = document.location.href="http://hugomarques.fr/admin";
      }, 8200);
  }
