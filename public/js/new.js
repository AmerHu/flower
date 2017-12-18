var output = document.getElementById('output');
document.getElementById('btn1').onclick = function () {
    var a = new XMLHttpRequest();
    a.onReadyState = function () {
        console.log(a);
    };
    a.open('GET', 'http://http://api.myjson.com/bins/1sne0', true);
    a.send();

};