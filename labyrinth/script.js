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
    generateLabyrinth(rows, cols) {
        this.walls = [];
        for (let row = 0; row < rows; row++) {
            this.walls[row] = [];

            for (let col = 0; col < cols; col++) {
                if (col === 0 || col === cols - 1) {
                    this.walls[row][col] = 1;
                } else if (row === 0) {
                    if (this.walls[row].includes(0)) {
                        this.walls[row][col] = 1;
                    } else {
                        this.walls[row][col] = Math.round(Math.random())
                    }
                } else {
                    if (this.walls[row - 1][col] === 0) {
                        if (this.walls[row - 1][col - 1] === 1 && this.walls[row - 1][col + 1] === 1) {
                            this.walls[row][col] = 0;
                        } else if (this.walls[row - 1][col - 1] === 1 && this.walls[row - 1][col + 1] === 0) {
                            if (Math.round(Math.random())) {
                                this.walls[row][col] = 0;
                            } else {
                                this.walls[row][col + 1] = 0;
                                this.walls[row][col] = 1;
                            }
                        } else if (this.walls[row - 1][col + 1] === 1 && this.walls[row - 1][col - 1] === 0) {
                            if (Math.round(Math.random())) {
                                this.walls[row][col] = 0;
                            } else {
                                this.walls[row][col - 1] = 0;
                                this.walls[row][col] = 1;
                            }
                        } else {
                            this.walls[row][col] = Math.round(Math.random());
                        }

                    } else {
                        this.walls[row][col] = Math.round(Math.random());
                    }

                }


            }


        }
        let enter = false;
        for (let i = settings.colsCount - 1; i >= 0; i--) {
            if (game.labyrinth.walls[settings.rowsCount - 1][i] === 0) {
                if (enter === false) {
                    enter = true;
                } else {
                    game.labyrinth.walls[settings.rowsCount - 1][i] = 1;
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
                td.innerText = array[row][col];
                tr.appendChild(td);
            }
        }
    },
};

const man = {
    manStartPositionRow: null,
    manStartPositionCol: null,
    manPositionRow: null,
    manPositionCol: null,
    direction: 'up',
    nextStepRow: null,
    nextStepCol: null,
    manStartPosition() {
        const lastRow = game.labyrinth.walls.length - 1;
        this.manStartPositionRow = lastRow;
        for (let col = game.labyrinth.walls[lastRow].length - 1; col >= 0; col--) {
            if (game.labyrinth.walls[lastRow][col] === 0) {
                this.manStartPositionCol = col;
                break;
            }
        }
        this.manPositionRow = this.manStartPositionRow;
        this.manPositionCol = this.manStartPositionCol;

    },
    makeStep() {

        this.turnRight();
        for (let i = 1; i <= 4; i++) {
            this.nextStep();
            if (game.isWall()) {
                this.turnLeft();
                continue;
            }
            // if (game.isOut()) {
            //
            //
            //     break;
            // } else if (game.isWall()) {
            //     this.turnLeft();
            //     continue;
            // }
            break;
        }

        this.manPositionRow = this.nextStepRow;
        this.manPositionCol = this.nextStepCol;
        renderer.labyrinthRender(labyrinth.walls);
        game.isEnd();
        console.log(this.manPositionRow, this.manPositionCol)
    },

    nextStep() {
        if (game.isOut()) {
            return;
        }
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
    speed: 15,
};

const game = {
    settings,
    labyrinth,
    timer: null,
    status: 'stop',
    test: false,
    init() {
        while (true) {
            labyrinth.generateLabyrinth(this.settings.rowsCount, this.settings.colsCount);

            man.manStartPosition();


            if (this.testLabyrinth()) {
                man.manStartPositionRow = man.manPositionRow;
                man.manStartPositionCol = man.manPositionCol;
                renderer.labyrinthRender(this.labyrinth.walls);
                this.timer = setInterval(() => man.makeStep(), 1000 / settings.speed);
                break;
            }
        }


    },

    testLabyrinth() {
        for (let i = 0; i < 1000; i++) {
            man.makeStep();
        }
        return this.test;
    },

    isWall() {
        if (this.labyrinth.walls[man.nextStepRow][man.nextStepCol]) {
            return true;
        }
    },
    isOut() {
        if (man.manPositionRow + 1 === this.settings.rowsCount) {
            return true;
        }
    },
    isEnd() {
        if (man.manPositionRow === 0) {
            window.clearInterval(this.timer);
            this.status = 'stop';
            const manStyle = document.getElementsByClassName('man');
            manStyle[0].className = 'blinkingMan';

            this.test = true;
        }
    }
};

window.onload = game.init();