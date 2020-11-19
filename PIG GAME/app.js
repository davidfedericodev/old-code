/*
GAME RULES:

- The game has 2 players, playing in rounds
- In each turn, a player rolls a dice as many times as he whishes. Each result get added to his ROUND score
- BUT, if the player rolls a 1, all his ROUND score gets lost. After that, it's the next player's turn
- The player can choose to 'Hold', which means that his ROUND score gets added to his GLBAL score. After that, it's the next player's turn
- The first player to reach 100 points on GLOBAL score wins the game

*/

var scores, roundScore, activePlayer, dice, gamePlaying, isEasy = true;


// Start the game
init();

// Event listeners


document.querySelector('.btn-new').addEventListener('click', init);

document.querySelector('.btn-easy').addEventListener('click', function(){
    isEasy = true;
    this.classList.add("active");
    document.querySelector('.btn-hard').classList.remove("active");
    init();
});

document.querySelector('.btn-hard').addEventListener('click', function(){
    isEasy = false;
    this.classList.add("active");
    document.querySelector('.btn-easy').classList.remove("active");
    init();
});

window.addEventListener('keypress', newDiceKey);

document.querySelector('.btn-roll').addEventListener('click', function(){

  if(gamePlaying) {
    newDice();
  }
  
});

document.querySelector('.btn-hold').addEventListener('click', function(){

  if(gamePlaying) {
    holdScore();
  }
  
});

// Functions definition

function init() {
  scores = [0, 0];
  activePlayer = 0;
  roundScore = 0;
  gamePlaying = true;
  document.querySelector('.game-score').value = null;
  document.querySelector('.dice').style.display = 'none';
  document.querySelector('.dice1').style.display = 'none';

  document.getElementById('score-0').textContent = '0';
  document.getElementById('score-1').textContent = '0';
  document.getElementById('current-0').textContent = '0';
  document.getElementById('current-1').textContent = '0';
  document.querySelector('#name-0').textContent = 'Player 1';
  document.querySelector('#name-1').textContent = 'Player 2';
  document.querySelector('.player-0-panel').classList.remove('winner');
  document.querySelector('.player-1-panel').classList.remove('winner');
  document.querySelector('.player-0-panel').classList.remove('active');
  document.querySelector('.player-1-panel').classList.remove('active');
  document.querySelector('.player-0-panel').classList.add('active');
}

function nextPlayer() {
  //next player
  activePlayer === 0 ? activePlayer = 1 : activePlayer = 0; 
  roundScore = 0;

  document.getElementById('current-0').textContent = '0';
  document.getElementById('current-1').textContent = '0';

  document.querySelector('.player-0-panel').classList.toggle('active');
  document.querySelector('.player-1-panel').classList.toggle('active');

  document.querySelector('.dice').style.display = 'none';
  document.querySelector('.dice1').style.display = 'none';
}

function newDiceKey(e){
  e.stopPropagation();
  if(gamePlaying) {
    if(e.code === "Space"){
      newDice();
    }  else if(e.code === "Enter") {
      holdScore();
    }
  }
  
};

function newDice(){

  if(isEasy == true){
    // 1. Random number
    var dice = Math.floor(Math.random() * 6) + 1;

    // 2. Display the resylt
    var diceDom = document.querySelector('.dice');

    diceDom.style.display = 'block';
    diceDom.src = 'dice-' + dice + '.png';

    // 3. Update the round score IF the rolled number was not a 1
    if(dice !== 1) {
      //add score
      roundScore += dice; //roundScore = roundScore + totalDice
      document.querySelector('#current-' + activePlayer).textContent = roundScore;
    } else {
      nextPlayer();
    }
  } else {
    // 1. Random number
    var dice = Math.floor(Math.random() * 6) + 1;

    var dice1 = Math.floor(Math.random() * 6) + 1;

    // console.log(dice, copyDice);

    // 2. Display the resylt
    var diceDom = document.querySelector('.dice');
    var diceDom1 = document.querySelector('.dice1');

    diceDom.style.display = 'block';
    diceDom.src = 'dice-' + dice + '.png';

    diceDom1.style.display = 'block';
    diceDom1.src = 'dice-' + dice1 + '.png';

    // 3. Update the round score IF the rolled number was not a 1
    if(dice === 6 && dice1 === 6) {
      roundScore = 0;
      scores[activePlayer] += roundScore;

      document.querySelector('#score-' + activePlayer).textContent = scores[activePlayer];
      nextPlayer();
    } else if(dice !== 1 && dice1 !== 1) {
      //add score
      roundScore += dice + dice1; //roundScore = roundScore + totalDice
      document.querySelector('#current-' + activePlayer).textContent = roundScore;
    } else {
      nextPlayer();
    }
  }
  
}



function holdScore() {
  // Add Current score to global score
  scores[activePlayer] += roundScore;

  // Update the ui
  document.querySelector('#score-' + activePlayer).textContent = scores[activePlayer];

  // Check if the player won the game
  if(scores[activePlayer] >= document.querySelector('.game-score').value) {
    document.querySelector('#name-' + activePlayer).textContent = 'Winner!';
    document.querySelector('.dice').style.display = 'none';
    document.querySelector('.dice1').style.display = 'none';
    document.querySelector('.player-' + activePlayer + '-panel').classList.add('winner');
    document.querySelector('.player-' + activePlayer + '-panel').classList.remove('active');
    gamePlaying = false;
  } else {
    nextPlayer();
  }
}




// function holdFunctionKey(event){
//   if(gamePlaying) {
//     if(event.code === "Enter"){
      
//     }
//   }
//   event.stopPropagation();
// };
