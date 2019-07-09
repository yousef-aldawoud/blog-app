var colors = ['red','purple','yellow','green','blue'];
posts = document.getElementsByClassName("card");
for (var i = 0;i<posts.length;i++){
    var random_color = colors[Math.floor(Math.random() * colors.length)];
    posts[i].style['border-left']="solid 3px "+random_color;
}