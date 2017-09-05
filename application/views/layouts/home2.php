<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Building a router</title>
  <script>
    var simpleRoute={
                router:function($routes){
                  var el = this.el || document.getElementById('view');
                  var url = location.hash.slice(1) || '/';
                  var routex = $routes["/"+url];
                  if (el && routex.controller) {
                      el.innerHTML = routex.controller();
                  }
                }
             }

              var SetRuoutes={
                "/":{controller:function(){
                    return "V";
                }},
                "/page1":{controller:function(){
                    return "X";
                }},
                "/page2":{
                    controller:function(){
                      return "Y";
                  }},
              }

              this.addEventListener('hashchange', simpleRoute.router(SetRuoutes));
              this.addEventListener('load', simpleRoute.router(SetRuoutes));
    </script>
  <script type="text/html" id="home">
    <h1>Router FTW!</h1>
  </script>
  <script type="text/html" id="template1">
    <h1>Page 1: <%= greeting %></h1>
    <p><%= moreText %></p>
    <button class="my-button">Click me <%= counter %></button>
  </script>
  <script type="text/html" id="template2">
    <h1>Page 2: <%= heading %></h1>
    <p>Lorem ipsum...</p>
  </script>
  <script type="text/html" id="error404">
    <h1>404 Not found</h1>
  </script>
</head>
<body>
  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#/page1">Page 1</a></li>
    <li><a href="#/page2">Page 2</a></li>
  </ul>
  <div id="view"></div>
  
</body>
</html>