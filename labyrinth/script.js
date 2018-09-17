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
    speed: 2,
};

const game = {
    settings,
    labyrinth,
    init() {
        renderer.labyrinthRender(this.labyrinth.walls);
        let timer = setInterval(() => man.makeStep(), 500);
    },

    isWall() {
        if (this.labyrinth.walls[man.nextStepRow][man.nextStepCol]) {
            return true;
        }
    },
};

window.onload = game.init();