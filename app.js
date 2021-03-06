
window.onload = function () {
    const userScore_span = document.getElementById("user-score");
    const computerScore_span = document.getElementById("comp-score");
    const message_p = document.querySelector(".result").children[0];
    const rock_img = document.getElementById("r");
    const paper_img = document.getElementById("p");
    const scissors_img = document.getElementById("s");
    const rock_div = rock_img.parentElement;
    const paper_div = paper_img.parentElement
    const scissors_div = scissors_img.parentElement;
    const saveButton = document.querySelector("#save > button");
    const compScore_input = document.getElementById("compScore_input");
    const userScore_input = document.getElementById("userScore_input");
    /*let userScore = 0;
    let computerScore = 0;*/

    function getComputerChoice() {
        const choices = ["r", "p", "s"];
        return choices[Math.floor(Math.random() * (2 - 0 + 1) + 0)];
    }

    function win(userChoice, computerChoice) {
        //userScore++;
        userScore_span.innerHTML++;
        message_p.innerHTML = `${getFullWord(userChoice)} beats ${getFullWord(computerChoice)}. You win`;
        changeColor(userChoice, "win");
    }

    function draw(userChoice, computerChoice) {
        message_p.innerHTML = `${getFullWord(userChoice)} equals ${getFullWord(computerChoice)}. It's a draw`;
        changeColor(userChoice, "draw");
    }

    function lose(userChoice, computerChoice) {
        //computerScore++;
        computerScore_span.innerHTML++;
        message_p.innerHTML = `${getFullWord(computerChoice)} beats ${getFullWord(userChoice)}. computer wins`;
        changeColor(userChoice, "lose");
    }

    function changeColor(userChoice, result) {
        if (result === "draw")
            color = "gray";
        else {
            if (result === "win")
                color = "green";
            else
                color = "red";
        }

        document.getElementById(userChoice).parentElement.classList.add(`${color}-glow`);
        setTimeout(() => {
            document.getElementById(userChoice).parentElement.classList.value = "choice";
        }, 500);
    }

    function getFullWord(choice) {
        if (choice === "r") return "rock";
        if (choice === "p") return "paper";
        return "scissors";
    }


    function playRound(userChoice) {
        const computerChoice = getComputerChoice();

        switch (userChoice + computerChoice) {
            case "rs":
            case "pr":
            case "sp":
                win(userChoice, computerChoice);
                break;
            case "rr":
            case "pp":
            case "ss":
                draw(userChoice, computerChoice);
                break;
            default:
                lose(userChoice, computerChoice);
        }
    }

    rock_img.addEventListener("click", function () {
        playRound("r");
    });

    paper_img.addEventListener("click", function () {
        playRound("p");
    });

    scissors_img.addEventListener("click", function () {
        playRound("s");
    });

    saveButton.addEventListener("click", function() {
        compScore_input.value = computerScore_span.innerHTML;
        userScore_input.value = userScore_span.innerHTML;
        //window.location.href = "http://localhost/rockPaperCissors/game.php?" + `compScore=${computerScore_span.innerHTML}&userScore=${userScore_span.innerHTML}`;
    });
}




