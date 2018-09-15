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
        for (let row = 0; row < array.length; row++) {
            const tr = document.createElement('tr');
            table.appendChild(tr);
            for (let col = 0; col < array[row].length; col++) {
            // for (let col = 0; col < 10; col++) {
                const td = document.createElement('td');
                const tdClass = array[row][col] ? 'wall' : 'empty';
                td.classList.add(tdClass);
                tr.appendChild(td);
            }
        }

        
    },
};

const man = {
    
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
        renderer.labyrinthRender(this.labyrinth.walls)
    }

};

window.onload = game.init();