'use strict';

const labyrinth = {
    walls: [
        [1, 1, 1, 1, 0, 1, 1, 1, 1, 1],
        [1, 0, 0, 0, 0, 1, 0, 0, 0, 1],
        [1, 0, 1, 1, 1, 1, 0, 1, 0, 1],
        [1, 0, 1, 0, 0, 1, 0, 1, 0, 1],
        [1, 0, 0, 0, 1, 1, 0, 1, 0, 1],
        [1, 0, 1, 1, 1, 1, 0, 1, 1, 1],
        [1, 0, 1, 0, 0, 1, 0, 0, 0, 1],
        [1, 0, 1, 0, 1, 1, 0, 1, 0, 1],
        [1, 0, 0, 0, 0, 0, 0, 1, 0, 1],
        [1, 1, 1, 1, 1, 0, 1, 1, 1, 1],
    ],
    generatelabyrinth(rows, cols) {
        for (let row = 0; row < rows; row++) {

            for (let col = 0; col < cols; col++) {
                if (col === 0 || col === cols - 1) {
                    this.walls[row][col] = 1;
                } else if (row === 0 || row === rows - 1) {
                    if (!this.walls[row].includes(0)) {
                        this.walls[row][col] = Math.round(Math.random());
                    }
                } else {
                    this.walls[row][col] = Math.round(Math.random());
                }


            }


        }

    },

};

const renderer = {
    labyrinthRender(array) {
        const table = document.getElementById('labyrinth');
        table.innerHTML = "";
        for (let row = 0; row < array.length; row++) {
            const tr = document.createElement('tr');
            table.appendChild(tr);
            for (let col = 0; col < array[row].length; col++) {
                const td = document.createElement('td');
                let tdClass = array[row][col] ? 'wall' : 'empty';
                if (row === man.manPositionRow && col === man.manPositionCol) {
                    tdClass = 'man';
                }

                td.classList.add(tdClass);
                tr.appendChild(td);
            }
        }
    },
};

const man = {
    manPositionRow: 9,
    manPositionCol: 5,
    direction: 'up',
    nextStepRow: null,
    nextStepCol: null,
    makeStep() {

        this.turnRight();
        for (let i = 1; i <= 4; i++) {
            this.nextStep();

            if (game.isWall()) {
                this.turnLeft();
                continue;
            }
            break;
        }

        this.manPositionRow = this.nextStepRow;
        this.manPositionCol = this.nextStepCol;
        renderer.labyrinthRender(labyrinth.walls);
        game.isOut();
    },

    nextStep() {
        this.nextStepRow = this.manPositionRow;
        this.nextStepCol = this.manPositionCol;
        if (this.direction === 'right') {
            this.nextStepCol = this.manPositionCol + 1
        } else if (this.direction === 'up') {
            this.nextStepRow = this.manPositionRow - 1
        } else if (this.direction === 'left') {
            this.nextStepCol = this.manPositionCol - 1
        } else {
            this.nextStepRow = this.manPositionRow + 1
        }
    },

    turnLeft() {
        if (this.direction === 'right') {
            this.direction = 'up'
        } else if (this.direction === 'up') {
            this.direction = 'left'
        } else if (this.direction === 'left') {
            this.direction = 'down'
        } else {
            this.direction = 'right'
        }
    },
    turnRight() {
        if (this.direction === 'right') {
            this.direction = 'down'
        } else if (this.direction === 'up') {
            this.direction = 'right'
        } else if (this.direction === 'left') {
            this.direction = 'up'
        } else {
            this.direction = 'left'
        }
    },
};

const settings = {
    rowsCount: 10,
    colsCount: 10,
    speed: 20,
};

const game = {
    settings,
    labyrinth,
    timer: null,
    status: 'stop',
    init() {
        labyrinth.generatelabyrinth(this.settings.rowsCount, this.settings.colsCount);
        renderer.labyrinthRender(this.labyrinth.walls);
        this.labyrinth = labyrinth;

        this.timer = setInterval(() => man.makeStep(), 1000 / settings.speed);

    },

    isWall() {
        if (this.labyrinth.walls[man.nextStepRow][man.nextStepCol]) {
            return true;
        }
    },
    isOut() {
        if (man.manPositionRow === 0) {
            window.clearInterval(this.timer);
            this.status = 'stop';
            const manStyle = document.getElementsByClassName('man');
            manStyle[0].className = 'blinkingMan';
        }
    }
};

window.onload = game.init();