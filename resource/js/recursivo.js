var heroesDc = new Array();
array1[0] = 'Superman';
array1[1] = 'Batman';
array1[2] = 'Flash';
array1[3] = 'Aquaman';

var heroesMarvel = new Array();
array2[0] = 'Iron Man';
array2[1] = 'Hulk';
array2[2] = 'Thor';
array2[3] = 'Capitan America';

var otrosHeroes = new Array();
array3[0] = 'Chapulin Colorado';
array3[1] = 'Goku';
array3[2] = 'Dios';
array3[3] = 'Jesus';

var Heroes = new Array();
Heroes[0] = heroesDc;
Heroes [1] = heroesMarvel;
Heroes [2] = otrosHeroes;

var tamaño1 = Heroes.length();

function recorro(Heroes) {
    Heroes.forEach(function(hijo, index) {
        if (hijo instanceof Array) {
            recorro(hijo);
        } else {
            console.log(hijo);
        }
    });
}