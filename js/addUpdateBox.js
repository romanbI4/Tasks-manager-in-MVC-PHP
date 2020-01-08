(function(count) {
    var i = 0;

    for (i; i < count; i++) {
        var article = document.getElementById('update_box');
        article.setAttribute('data-id', i);
        article.className = 'update_box';
        document.body.append(article);

        var button = document.getElementById('update_open');
        button.setAttribute('data-id', i);
        button.className = 'update_open';
        document.body.append(button);
    }
})(2);

var articles = document.querySelectorAll('.update_box');
var buttons = document.querySelectorAll('.update_open');

function toggle(e, id) {
    var button = e.target;
    var article = articles[id];

    if (article.classList.contains('open')) {
        article.classList.remove('open');
        button.innerHTML = 'Изменить статус/текст задачи';
    } else {
        article.classList.add('open');
        button.innerHTML = 'Закрыть';
    }
}

var i = 0;
for (i; i < buttons.length; i++) {
    (function(index) {
        buttons[i].addEventListener(
            'click',
            function(e) {
                return toggle(e, index);
            },
            false
        );
    })(i);
}